<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'button_text',
        'button_link',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function stats(): HasMany
    {
        return $this->hasMany(HeroStat::class)->orderBy('order');
    }

    /**
     * Gambar-gambar yang bakal ganti-ganti (slideshow) di background hero.
     * $hero->image (kolom lama, single) TETAP dipertahankan sebagai fallback
     * kalau belum ada satupun gambar di sini -- biar gak ngerusak data lama.
     */
    public function images(): HasMany
    {
        return $this->hasMany(HeroImage::class)->orderBy('order');
    }
}