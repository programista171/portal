<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    protected $fillable = [
        "userid", "postid", "ispositive"
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
