<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Contact info is a singleton (phone, WhatsApp, address, hours, socials).
     * Visitor messages are NOT stored in the database — the frontend contact
     * form redirects straight to WhatsApp (wa.me) instead of submitting here.
     */
    public function edit()
    {
        $contact = Contact::first() ?? new Contact();
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'nullable|string|max:30',
            'whatsapp' => 'required|string|max:30',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'operational_hours' => 'nullable|string|max:100',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
        ]);

        $contact = Contact::first();

        if ($contact) {
            $contact->update($validated);
        } else {
            Contact::create($validated);
        }

        return redirect()->route('admin.contact.edit')->with('success', 'Info kontak berhasil diperbarui.');
    }
}
