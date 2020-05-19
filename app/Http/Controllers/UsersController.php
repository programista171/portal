<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;

class UsersController extends Controller{
	public function index($id){
		$user = User::find($id);
		return view('users.index')->with('user', $user);
	}//endFunction


	public function imageAdd(Request $request){
$profile = Auth::user()->profile;
//var_dump($profile);
$image = $request->file('image');
$uploader = Auth::user()->login;
$name = $uploader . '.' . $image->getClientOriginalExtension();
$profile->image = "profile_images/$name";
$profile->save();
return $image->move('profile_images', $name);
	}//endFunction

}//endClass