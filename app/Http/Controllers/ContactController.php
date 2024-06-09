<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = $request->only(['name', 'email', 'message']);
        Mail::send('emails.contact', $data, function($message) {
            $message->to('admin@example.com')
                    ->subject('New Contact Form Submission');
        });

        return back()->with('success', 'Thank you for your message!');
    }
}