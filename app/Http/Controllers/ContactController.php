<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        $name=request()->name;
        $message=request()->message;
        Mail::to(env('MAIL_USERNAME'))->send(new AdminMail($name,$message));
        return redirect()->route('contact');
    }
}

