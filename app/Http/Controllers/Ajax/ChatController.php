<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return Message::orderBy('id', 'desc')->get();
    }

    public function create(Request $request)
    {
        Message::create([
            'body' => $request->message
        ]);
    }
}
