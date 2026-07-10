<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::with(['stats', 'images'])->first();

        return view('admin.hero.index', compact('hero'));
    }

    public function edit()
    {
        $hero = Hero::with(['stats', 'images'])->first() ?? new Hero(['stats' => collect(), 'images' => collect()]);

        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'stats' => 'nullable|array',
            'stats.*.label' => 'required_with:stats|string|max:100',
            'stats.*.value' => 'required_with:stats|string|max:50',
            'stats.*.icon' => 'nullable|string|max:100',
            // Gambar-gambar buat slideshow (bisa upload banyak sekaligus)
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048',
            // ID gambar lama yang mau dihapus (dicentang di form)
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'integer|exists:hero_images,id',
        ]);

        $hero = Hero::first();

        if ($request->hasFile('image')) {
            if ($hero?->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $validated['image'] = $request->file('image')->store('heroes', 'public');
        }

        if ($hero) {
            $hero->update($validated);
        } else {
            $hero = Hero::create($validated);
        }

        // Replace stats: hapus lama, insert baru sesuai input form
        $hero->stats()->delete();
        foreach ($request->input('stats', []) as $index => $stat) {
            $hero->stats()->create([
                'label' => $stat['label'],
                'value' => $stat['value'],
                'icon' => $stat['icon'] ?? null,
                'order' => $index,
            ]);
        }

        // Hapus gambar slideshow yang dicentang buat dihapus
        if ($request->filled('delete_images')) {
            $imagesToDelete = $hero->images()->whereIn('id', $request->input('delete_images'))->get();
            foreach ($imagesToDelete as $img) {
                Storage::disk('public')->delete($img->image);
                $img->delete();
            }
        }

        // Tambah gambar slideshow baru (kalau ada yang diupload)
        if ($request->hasFile('images')) {
            $currentMaxOrder = (int) $hero->images()->max('order');
            foreach ($request->file('images') as $index => $file) {
                $path = $file->store('heroes', 'public');
                $hero->images()->create([
                    'image' => $path,
                    'order' => $currentMaxOrder + $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.hero.index')->with('success', 'Hero berhasil diperbarui.');
    }

    public function destroy()
    {
        $hero = Hero::with('images')->first();

        if ($hero) {
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            foreach ($hero->images as $img) {
                Storage::disk('public')->delete($img->image);
            }
            $hero->delete(); // stats & images auto-deleted via cascade
        }

        return redirect()->route('admin.hero.index')->with('success', 'Hero banner berhasil dihapus.');
    }
}