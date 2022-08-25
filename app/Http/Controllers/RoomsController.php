<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;

class RoomsController extends Controller
{
    
    public function index()
    {
        $roomsRes = Room
            ::with(["chats" => function ($query) {
                $query->with("user")->latest();
                // $chats->first();
            }])->where("user_id", request("id"))
            ->orWhere("chat_user_id", request("id"))
            ->get();

        $rooms = [];
        foreach ($roomsRes as $room) {
            if ($room->chats != NULL && count($room->chats) > 0) {
                error_log($room->user_id);
                $room->chat_user = User::find($room->user_id == request("id") ? $room->chat_user_id : request("id"));
                array_push($rooms, $room);
            }
        }

        return ["success" => true, "rooms" => $rooms];
    }

    public function verify()
    {
        $userRoom = Room::where("user_id", request("userId"))
            ->where("chat_user_id", request("chatUserId"))
            ->firstOr(function () {
                $userRoom = Room::where("user_id", request("chatUserId"))
                    ->where("chat_user_id", request("userId"))->get()->first();
                if ($userRoom == NULL) {
                    $userRoom = new Room();
                    $userRoom->user_id = request("userId");
                    $userRoom->chat_user_id = request("chatUserId");
                    $userRoom->save();
                }
                return $userRoom;
            });
        return $userRoom;
    }
}
