<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Location;
use App\Models\Package;

class ContactController extends Controller
{
    /**
     * The contact form does NOT submit to the server — it's handled by
     * JavaScript on the frontend, which builds a wa.me link from the
     * filled fields and redirects the visitor straight to WhatsApp.
     * This method only supplies the data needed to render the page
     * (contact info, location, and the package dropdown options).
     */
    public function index()
    {
        $contact = Contact::first();
        $location = Location::latest()->first();
        $packages = Package::where('is_active', true)->orderBy('order')->get(['id', 'name', 'price']);

        return view('pages.contact', compact('contact', 'location', 'packages'));
    }
}
