<?php

namespace App\Http\Controllers\Ajax;

use App\Events\MessageCreated;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return Message::orderBy('id', 'desc')->get();
    }

    public function create(Request $request)
    {
        $message = Message::create([
            'body' => $request->message,
        ]);
        event(new MessageCreated($message));
    }
}
