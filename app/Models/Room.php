<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function chats()
    {
        return $this->hasMany('App\Models\Chat');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User',"user_id","id");
    }

    public function chatUser()
    {
        return $this->belongsTo('App\Models\User',"chat_user_id","id");
    }
}
