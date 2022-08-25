<?php

namespace App\Http\Controllers;

use App\Models\Friend;

class FriendsController extends Controller
{

    public function index(){
        $friends = Friend::where("user_id",request("id"))
            ->orWhere("friend_id",request("id"))
            ->get();
        return $friends;
    }

    public function store()
    {
        $friend = new Friend();
        $friend->user_id = request("id");
        $friend->friend_id = request("friendId");
        $friend->save();
        return ["success"=>true];
    }

    

}
