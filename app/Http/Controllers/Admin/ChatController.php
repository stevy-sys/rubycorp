<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index() {
        $conversations = Conversation::with(['user','lastMessage'])->get();
        return Inertia::render('Admin/Chat',compact('conversations'));
    }
   

    public function messages(Request $request)  {
        return response()->json([
            'messages' => Message::where('conversation_id',$request->conversation_id)->get()
        ]);
    }

    public function sendMessage(Request $request)  {
        $message = Message::create([
            'user_id' => Auth::id(),
            'message' => $request->message ,
            'conversation_id' => $request->conversation_id
        ]);
        
        return response()->json([
            'message' => $message
        ]);
    }
}
