<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('order')->paginate(12);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|max:2048',
            'category' => 'nullable|string|max:100',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['image'] = $request->file('image')->store('galleries', 'public');
        $validated['order'] = $validated['order'] ?? 0;

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:100',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);
            $validated['image'] = $request->file('image')->store('galleries', 'public');
        }
        $validated['order'] = $validated['order'] ?? $gallery->order;

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil dihapus.');
    }
}