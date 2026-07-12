<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::with('benefits')->first();

        return view('pages.about', compact('about'));
    }
}