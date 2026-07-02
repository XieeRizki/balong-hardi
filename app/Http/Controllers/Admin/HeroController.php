<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\HeroStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::with('stats')->latest()->paginate(10);
        return view('admin.heroes.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.heroes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'stats' => 'nullable|array',
            'stats.*.label' => 'required_with:stats|string|max:100',
            'stats.*.value' => 'required_with:stats|string|max:50',
            'stats.*.icon' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('heroes', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active');

        $hero = Hero::create($validated);

        if ($request->filled('stats')) {
            foreach ($request->input('stats') as $index => $stat) {
                $hero->stats()->create([
                    'label' => $stat['label'],
                    'value' => $stat['value'],
                    'icon' => $stat['icon'] ?? null,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.heroes.index')->with('success', 'Hero berhasil ditambahkan.');
    }

    public function edit(Hero $hero)
    {
        $hero->load('stats');
        return view('admin.heroes.edit', compact('hero'));
    }

    public function update(Request $request, Hero $hero)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'stats' => 'nullable|array',
            'stats.*.label' => 'required_with:stats|string|max:100',
            'stats.*.value' => 'required_with:stats|string|max:50',
            'stats.*.icon' => 'nullable|string|max:100',
        ]);

        if ($request->hasFile('image')) {
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }
            $validated['image'] = $request->file('image')->store('heroes', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active');

        $hero->update($validated);

        // Replace stats: delete old, insert new (simplest approach for reorderable list)
        if ($request->has('stats')) {
            $hero->stats()->delete();
            foreach ($request->input('stats') as $index => $stat) {
                $hero->stats()->create([
                    'label' => $stat['label'],
                    'value' => $stat['value'],
                    'icon' => $stat['icon'] ?? null,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.heroes.index')->with('success', 'Hero berhasil diperbarui.');
    }

    public function destroy(Hero $hero)
    {
        if ($hero->image) {
            Storage::disk('public')->delete($hero->image);
        }
        $hero->delete(); // stats auto-deleted via onDelete('cascade')

        return redirect()->route('admin.heroes.index')->with('success', 'Hero berhasil dihapus.');
    }
}
