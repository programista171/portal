<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Invitation;

class InvitationsController extends Controller{
	public function invite(Request $request){
		$invitation = new Invitation();
		$invitation->invited = $request->invited;
		$invitation->inviter = $request->inviter;
		$invitation->save();
		return 'Zaproszono';
	}//endFunction

}//endClass