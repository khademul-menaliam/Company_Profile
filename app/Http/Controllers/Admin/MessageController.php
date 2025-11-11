<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.messages.index', compact('messages'));
        // admin.services.index
    }
    public function show($id)
    {
        $message = Message::where('id', $id)->firstOrFail();
        return view('admin.messages.view', compact('message'));
        // admin.services.index
    }
}
