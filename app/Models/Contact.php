<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Cuma nyimpen info kontak statis (telepon, WA, alamat, jam operasional).
    // Pesan dari pengunjung TIDAK disimpan di sini — form kontak redirect
    // langsung ke WhatsApp lewat JS di frontend.
    protected $fillable = [
        'phone',
        'whatsapp',
        'email',
        'address',
        'operational_hours',
        'instagram',
        'facebook',
    ];
}
