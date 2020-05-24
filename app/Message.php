<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Helper\Table;

class Message extends Model
{
    protected $fillable = [
        'users_id', "sender_id", "content"
    ];

    public static function getMessages($user1, $user2)
    {
        return Message::all()->whereIn("users_id", ["$user1, $user2", "$user2, $user1"]);
    }
}
