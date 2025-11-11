<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($data);

        // Optional email to admin
        if (config('mail.from.address')) {
            Mail::raw("New message from {$data['name']} ({$data['email']}):\n\n{$data['message']}", function ($mail) use ($data) {
                $mail->to(config('mail.from.address'))
                     ->subject('New Contact Message: '.$data['subject']);
            });
        }

        return back()->with('success', 'Your message has been sent!');
    }
}
