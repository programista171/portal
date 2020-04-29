<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
//get the user that owns the post
public function user(){
return $this->belongsTo(User::class, 'userid');
}//endfunction

}//endClass