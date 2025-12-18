<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Handle contact form submission.
     */
    public function send(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Option 1: Send email (configure your mail in .env)
        Mail::send([], [], function($mail) use ($request) {
            $mail->to('info@fragranceofgod.org') // NGO email
                ->subject($request->subject)
                ->setBody(
                    "Name: {$request->name}\nEmail: {$request->email}\n\nMessage:\n{$request->message}",
                    'text/plain'
                );
        });

        // Option 2: Save to database (optional)
        // ContactMessage::create($request->all());

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
