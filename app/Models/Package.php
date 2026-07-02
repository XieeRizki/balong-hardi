<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;

    protected $table = 'package';
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
        'features',
        'is_popular',
        'is_active'
    ];

    protected $casts = [
        'features' => 'json',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
    ];
}