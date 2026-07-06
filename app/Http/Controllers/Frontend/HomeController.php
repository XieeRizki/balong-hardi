<?php

namespace App\Http\Controllers\Frontend;

// Baris "use App\Http\Controllers\Controller;" udah dihapus dari sini
use App\Models\About;
use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\Facility;
use App\Models\Hero;
use App\Models\Package;
use App\Models\Testimonial;

// Hapus "extends Controller", jadi sisa begini aja:
class HomeController
{
    public function index()
    {
        $hero = Hero::with('stats')->where('is_active', true)->latest()->first();
        $about = About::with('benefits')->latest()->first();
        $facilities = Facility::where('is_active', true)->orderBy('order')->get();
        $packages = Package::with('features')->where('is_active', true)->orderBy('order')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('order')->get();
        $blogPosts = BlogPost::where('is_published', true)->latest('published_at')->take(3)->get();
        $contact = Contact::first();

        return view('pages.home', compact(
            'hero',
            'about',
            'facilities',
            'packages',
            'testimonials',
            'blogPosts',
            'contact'
        ));
    }
}