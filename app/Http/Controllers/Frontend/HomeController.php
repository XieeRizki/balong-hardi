<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\Facility;
use App\Models\Hero;
use App\Models\Location;
use App\Models\Package;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::with('stats')->first();
        $about = About::with('benefits')->first();
        $facilities = Facility::where('is_active', true)->orderBy('order')->get();
        $packages = Package::with('features')->where('is_active', true)->orderBy('order')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('order')->get();
        $blogPosts = BlogPost::where('is_published', true)->latest('published_at')->take(3)->get();
        $contact = Contact::first();
        $location = Location::first();

        return view('pages.home', compact(
            'hero',
            'about',
            'facilities',
            'packages',
            'testimonials',
            'blogPosts',
            'contact',
            'location'
        ));
    }
}