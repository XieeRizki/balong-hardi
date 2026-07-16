<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::where('is_active', true)
            ->orderBy('order')
            ->paginate(5); // 1 featured (besar) + 4 kecil per halaman

        return view('pages.facilities', compact('facilities'));
    }
}