<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    // TODO run migration
    public function roomChats()
    {
        $chats = Chat::where("room_id", request("id"))
            ->with("user")
            ->get();

        return ["success" => true, "chats" => $chats];
    }

    public function store(Request $request)
    {
        error_log("chat");
        $user = User::find($request->user["id"]);
        if ($user == NULL) {
            return ["success" => false, "message" => "User not found"];
        }
        $chat = new Chat();
        $chat->message = $request->message;
        $chat->room_id = $request->roomId;
        $user->chats()->save($chat);
        $chat = Chat::where("id", $chat->id)
            ->with("user")
            ->get()
            ->first();
        $chat->roomId = $request->roomId;

        event(new ChatEvent($chat));
        return ["success" => true, "message" => $chat];
    }
}
