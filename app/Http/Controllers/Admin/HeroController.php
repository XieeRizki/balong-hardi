<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    /**
     * Hero is singleton: cuma ada 1 banner utama yang dipakai di homepage.
     * Kalau belum ada row sama sekali, bikin instance kosong biar form edit
     * tetap bisa dipakai buat isi data pertama kali.
     */
    public function edit()
    {
        $hero = Hero::with('stats')->first() ?? new Hero(['stats' => collect()]);

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

        return redirect()->route('admin.hero.edit')->with('success', 'Hero berhasil diperbarui.');
    }
}