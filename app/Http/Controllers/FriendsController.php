<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Friendship;
use App\Status;
use App\FriendFriendshipGroups;
use App\User;


class FriendsController extends Controller{
	public function invite(Request $request){
		$user = User::find($request->invited);
		Auth::user()->befriend($user);
		return 'Zaproszono';
	}//endFunction

	public function listFriends($id){
$user = User::find($id);
$friends = $user->getFriends();
		return view('users.list_friends')->with('friends', $friends);
	}//endFunction

	public function listRequests(){
		$requests = Auth::user()->getFriendRequests();
//return var_dump($requests);
		return view('users.requests')->with('requests', $requests);
	}//endFunction

	public function decide(Request $request){
//zaakceptuj zaproszenie do znajomych
if($request->has('accept')){
$sender = User::find($request->input('sender'));
Auth::user()->acceptFriendRequest($sender);
return 'Zaakceptowano';
}
//odrzuć zaproszenie do znajomych
else if($request->has('deny')){
return 'Spierdalaj w podskokach!';
}
//usuń z grona znajomych
else if($request->has('unfriend')){
$friend = User::find($request->input('friend'));
Auth::user()->unfriend($friend);
return 'Skasowano';
}

	}//endFunction


}//endClass