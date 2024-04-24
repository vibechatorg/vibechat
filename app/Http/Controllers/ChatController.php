<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class ChatController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Chat/Index');
    }

    /**
     * Show the chat page.
     *
     * @param $type
     * @param $roomId
     * @return Response
     */
    public function show($type, $roomId): Response
    {
        return Inertia::render('Chat/Chat', ['roomId' => $roomId]);
    }

    /**
     * Send a message to the chat.
     *
     * @param MessageRequest $request
     * @return JsonResponse
     */
    public function sendMessage(MessageRequest $request): JsonResponse
    {
        try {
            // Create a new message in the database.
            Message::query()->create($request->validated());

            // Broadcast the message to the chat for realtime chatting with users.
            broadcast(new MessageSent($request->validated()))->toOthers();

            // Return a response.
            return response()->json(['status' => 'Message sent!']);
        } catch(\Exception $e) {
            // Log the error for debugging purposes.
            Log::error("Failed to broadcast message: " . $request->user()->id, [
                'exception' => $e->getMessage(),
                'trace' => $e->getTrace(),
                'message' => $request->validated()
            ]);

            // Return an error response if an exception has placed.
            return response()->json(['status' => 'Failed to send message.'], 500);
        }
    }
}
