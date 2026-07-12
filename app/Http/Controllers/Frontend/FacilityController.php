<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::where('is_active', true)->orderBy('order')->get();

        return view('pages.facilities', compact('facilities'));
    }
}