<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Package;
use App\Models\BlogPost;
use App\Models\Testimonial;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stats = [
            'facilities' => Facility::count(),
            'packages' => Package::count(),
            'blog_posts' => BlogPost::count(),
            'testimonials' => Testimonial::count(),
            'galleries' => Gallery::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}