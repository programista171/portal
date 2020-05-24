<?php


namespace App;


use Illuminate\Support\Facades\Hash;

class Helpers
{

    public static function getThreadCode($user1, $user2) {
        return "$user1, $user2";
    }
}
