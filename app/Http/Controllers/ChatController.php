<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {

        broadcast(new MessageSent($request->message))->toOthers();

        return response()->json(['status' => 'Message sent!']);
    }
}
