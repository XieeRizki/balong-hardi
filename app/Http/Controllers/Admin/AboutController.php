<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * "About" is treated as a singleton (usually only 1 row exists),
     * but implemented as a resource in case multiple entries are needed later.
     */
    public function index()
    {
        $abouts = About::with('benefits')->latest()->paginate(10);
        return view('admin.about.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'benefits' => 'nullable|array',
            'benefits.*.title' => 'required_with:benefits|string|max:150',
            'benefits.*.description' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        $about = About::create($validated);

        if ($request->filled('benefits')) {
            foreach ($request->input('benefits') as $index => $benefit) {
                $about->benefits()->create([
                    'title' => $benefit['title'],
                    'description' => $benefit['description'] ?? null,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.about.index')->with('success', 'Konten About berhasil ditambahkan.');
    }

    public function edit(About $about)
    {
        $about->load('benefits');
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'benefits' => 'nullable|array',
            'benefits.*.title' => 'required_with:benefits|string|max:150',
            'benefits.*.description' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        $about->update($validated);

        if ($request->has('benefits')) {
            $about->benefits()->delete();
            foreach ($request->input('benefits') as $index => $benefit) {
                $about->benefits()->create([
                    'title' => $benefit['title'],
                    'description' => $benefit['description'] ?? null,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.about.index')->with('success', 'Konten About berhasil diperbarui.');
    }

    public function destroy(About $about)
    {
        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }
        $about->delete(); // benefits auto-deleted via cascade

        return redirect()->route('admin.about.index')->with('success', 'Konten About berhasil dihapus.');
    }
}
