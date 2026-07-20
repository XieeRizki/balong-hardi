<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reservation_date',
        'guests',
        'package_name',
        'message',
        'status',
    ];

    protected $casts = [
        'reservation_date' => 'date',
    ];
}