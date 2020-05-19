<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Traits\Friendable;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//get the posts owned by the specific user
	public function posts(){
		return $this->hasMany(Post::class, 'userid');
	}//endFunction

//get the comments owned by the specific user
	public function comments(){
		return $this->hasMany(Comment::class, 'userid');
	}//endFunction


//get the reactions for the specific post
	public function reactions(){
		return $this->hasMany(Reaction::class, 'userid');
	}//endFunction

	public function invitations(){
		return $this->hasMany(Invitation::class, 'invited');
	}//endFunction

	public function profile(){
		return $this->hasOne(Profile::class);
	}//endFunction

}//endClass