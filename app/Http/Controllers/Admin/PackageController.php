<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $packages = Package::all();
        return view('admin.package.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.package.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'duration' => 'required|string',
            'features' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->has('features')) {
            $features = array_filter(explode("\n", $request->features));
            $validated['features'] = json_encode($features);
        }

        Package::create($validated);

        return redirect()->route('admin.package.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit(Package $package)
    {
        $package->features = is_array($package->features) ? implode("\n", $package->features) : $package->features;
        return view('admin.package.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'duration' => 'required|string',
            'features' => 'nullable|string',
            'is_popular' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->has('features')) {
            $features = array_filter(explode("\n", $request->features));
            $validated['features'] = json_encode($features);
        }

        $package->update($validated);

        return redirect()->route('admin.package.index')->with('success', 'Paket berhasil diperbarui!');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.package.index')->with('success', 'Paket berhasil dihapus!');
    }
}