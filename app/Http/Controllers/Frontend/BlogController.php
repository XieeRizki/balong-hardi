<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Halaman khusus daftar SEMUA artikel blog (paginated), beda dari
     * section preview di Home yang cuma nampilin 3 artikel terbaru.
     */
    public function index(Request $request)
    {
        $query = BlogPost::where('is_published', true)->latest('published_at');

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $blogPosts = $query->paginate(9)->withQueryString();

        $categories = BlogPost::where('is_published', true)
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category');

        return view('pages.blog-index', compact('blogPosts', 'categories'));
    }
}