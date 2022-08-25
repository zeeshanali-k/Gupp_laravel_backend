<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo("App\Models\Room");
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User","user_id","id");
    }
    
    protected $casts = [
        'created_at' => "datetime:Y-m-d H:i:s",
    ];

}
