<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function edit()
    {
        $location = Location::first() ?? new Location();

        return view('admin.location.edit', compact('location'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string',
            'maps_url' => 'nullable|url|max:500',
        ]);

        $location = Location::first();

        if ($location) {
            $location->update($validated);
        } else {
            Location::create($validated);
        }

        return redirect()->route('admin.location.edit')->with('success', 'Lokasi berhasil diperbarui.');
    }
}