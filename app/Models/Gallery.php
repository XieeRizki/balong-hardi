<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';
    protected $fillable = [
        'title',
        'image',
        'category',
        'order',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}