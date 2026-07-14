<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;

class PricingController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('id')->get();

        return view('pages.pricing', compact('packages'));
    }
}