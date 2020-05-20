<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $fillable = [
        "userId", "postId", "ispossitive"
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'postid');
    }//endFunction


    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }//endFunction
}//endClass
