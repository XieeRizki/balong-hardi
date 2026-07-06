<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

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