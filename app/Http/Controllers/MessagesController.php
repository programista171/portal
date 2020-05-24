<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MessagesController extends Controller
{
    public function index() {
        $friends = Auth::user()->getFriends();
        $userId = $friends[0]->id;
        return redirect()->route("conversation", [$userId]);
    }

    public function conversation(Request $request, $userId) {
        if( !$userId ) return redirect()->route("messages");

        $yourId = Auth::user()->id;
        $friends = Auth::user()->getFriends();

        $conversationWith = User::find($userId);
        $messages = Message::getMessages($yourId, $userId);

        return View("messages.index")->with("friends", $friends)->with("messages", $messages)->with('conversationWith', $conversationWith);
    }

    protected function sendMessage(Request $request)
    {
        $user2 = $request->input("friendId");
        $user1 = Auth::user()->id;

        Message::create([
            "users_id" => "$user1, $user2",
            "sender_id" => $user1,
            "content" => $request->input("message")
        ]);

        return redirect()->back();
    }
}
