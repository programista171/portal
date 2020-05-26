<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Profile;
use Mockery\Exception;
use phpDocumentor\Reflection\Types\Boolean;

class UsersController extends Controller{
	public function index($id){
		$user = User::find($id);
		if( $user !== null ) {
		switch($user->profile->gender){
			case 'm':
				$user->profile->gender = 'mężczyzna';
				break;
			case 'f':
				$user->profile->gender = 'kobieta';
				break;
			default:
				$user->profile->gender = 'niezdefiniowana';
				break;
			}//endSwitch
$entries = $user->posts->take(5);
            return view('users.index')->with('user', $user);
        }
		else {
		    return view("users.404");
        }
	}//endFunction


	public function editProfile(){
		$user = Auth::user();
		return view('users.settings')->with('user', $user);
	}//endFunction

	public function updateProfile(Request $request){
		$this->validate($request, [
			'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);


//edycja danych usera
		$user = Auth::user();
		$user->firstname = $request->input('fname');
		$user->lastname = $request->input('lname');
		$user->login = $request->input('login');
		$user->email = $request->input('email');
		$user->save();

//personalizacja profilu
		$profile = Auth::user()->profile;
		$profile->description = $request->desc;
		if($request->has('gender'))
			$profile->gender = $request->gender;
		if($request->has('image')){
			$image = $request->file('image');
			$uploader = Auth::user()->login;
			$name = $uploader . '.' . $image->getClientOriginalExtension();
			$profile->image = "profile_images/$name";
			$image->move('profile_images', $name);
		}//endIf
		$profile->save();

		return redirect("/users/$user->id");
	}//endFunction

}//endClass