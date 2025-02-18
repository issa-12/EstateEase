<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Example: Store message in the session (you can save it to the database instead)
        session()->flash('success', 'Your message has been sent successfully!');

        // Redirect back to the contact page
        return redirect()->route('contact');
    }
}
