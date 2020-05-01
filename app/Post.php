<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
	//get the user that owns the post
	public function user(){
		return $this->belongsTo(User::class, 'userid');
	}//endFunction

	public function comments(){
		return $this->hasMany(Comment::class, 'postid');
	}//endFunction

	public function reactions(){
		return $this->hasMany(Reaction::class, 'postid');
	}//endFunction

}//endClass