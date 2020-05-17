<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Friendship;
use App\Status;
use App\FriendFriendshipGroups;
use App\User;


class FriendsController extends Controller{
	public function listFriends($id){
		$user = User::find($id);
		$friends = $user->getFriends();
		return view('users.list_friends')->with('friends', $friends);
	}//endFunction

	public function listRequests(){
		$requests = Auth::user()->getFriendRequests();
		return view('users.requests')->with('requests', $requests);
	}//endFunction

	public function decide(Request $request){
		//zaproś do grona znajomych
		if($request->has('invited')){
			$user = User::find($request->invited);
			Auth::user()->befriend($user);
		}
		//zaakceptuj zaproszenie do znajomych
		else if($request->has('accept')){
			$sender = User::find($request->input('sender'));
			Auth::user()->acceptFriendRequest($sender);
		}
		//odrzuć zaproszenie do znajomych
		else if($request->has('deny')){
			$sender = User::find($request->input('sender'));
			Auth::user()->denyFriendRequest($sender);
		}
		//usuń z grona znajomych
		else if($request->has('unfriend')){
			$friend = User::find($request->input('friend'));
			Auth::user()->unfriend($friend);
		}
		return redirect()->back();
	}//endFunction


}//endClass