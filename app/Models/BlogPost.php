<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Biar route model binding otomatis pakai slug, bukan id
    // Contoh: Route::get('/blog/{blogPost}', ...) -> /blog/tips-memancing-pagi
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
