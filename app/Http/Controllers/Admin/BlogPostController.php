<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = BlogPost::orderBy('published_at', 'desc')->get();
        return view('admin.blog-post.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog-post.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:100',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blog-post', 'public');
        }

        if ($request->has('is_published') && $request->is_published) {
            $validated['published_at'] = now();
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog-post.index')->with('success', 'Blog post berhasil ditambahkan!');
    }

    public function edit(BlogPost $blogPost)
    {
        return view('admin.blog-post.edit', compact('blogPost'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:100',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blog-post', 'public');
        }

        if ($request->has('is_published') && $request->is_published && !$blogPost->published_at) {
            $validated['published_at'] = now();
        }

        $blogPost->update($validated);

        return redirect()->route('admin.blog-post.index')->with('success', 'Blog post berhasil diperbarui!');
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect()->route('admin.blog-post.index')->with('success', 'Blog post berhasil dihapus!');
    }
}