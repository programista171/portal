<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model{
public function isInvited(){
return $this->belongsTo(User::class, 'invited', 'inviter'
;
}//endFunction

}//endClass