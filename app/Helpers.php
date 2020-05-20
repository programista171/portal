<?php


namespace App;


use Illuminate\Support\Facades\Hash;

class Helpers
{

    public static function getThreadCode($user1, $user2) {
        return Hash::make( $user1 . " with " . $user2 );
    }
}
