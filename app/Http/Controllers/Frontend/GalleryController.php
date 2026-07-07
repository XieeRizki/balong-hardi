<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::orderBy('order');

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $galleries = $query->paginate(12)->withQueryString();
        $categories = Gallery::whereNotNull('category')
            ->distinct()
            ->pluck('category');

        return view('pages.home', compact(
    'hero', 'about', 'facilities', 'packages', 'testimonials', 'blogPosts', 'contact'
));
    }
}
