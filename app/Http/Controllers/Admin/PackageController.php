<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('features')->orderBy('order')->paginate(10);
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'time_range' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'is_popular' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'features' => 'nullable|array',
            'features.*' => 'required|string|max:255',
        ]);

        $validated['is_popular'] = $request->boolean('is_popular');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        $package = Package::create($validated);

        if ($request->filled('features')) {
            foreach ($request->input('features') as $index => $feature) {
                $package->features()->create([
                    'feature' => $feature,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit(Package $package)
    {
        $package->load('features');
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'time_range' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'is_popular' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'features' => 'nullable|array',
            'features.*' => 'required|string|max:255',
        ]);

        $validated['is_popular'] = $request->boolean('is_popular');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = $validated['order'] ?? $package->order;

        $package->update($validated);

        if ($request->has('features')) {
            $package->features()->delete();
            foreach ($request->input('features') as $index => $feature) {
                $package->features()->create([
                    'feature' => $feature,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy(Package $package)
    {
        $package->delete(); // features auto-deleted via cascade

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil dihapus.');
    }
}
