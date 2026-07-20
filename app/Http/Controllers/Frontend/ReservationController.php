<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Nyimpen reservasi dari form publik (dipanggil via fetch/AJAX dari JS
     * di halaman Kontak / section Kontak Home). Setelah berhasil disimpen,
     * frontend baru redirect ke WhatsApp.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'reservation_date' => 'required|date|after_or_equal:today',
            'guests' => 'required|integer|min:1',
            'package_name' => 'required|string|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        Reservation::create($validated);

        return response()->json(['success' => true]);
    }
}