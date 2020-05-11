<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller{
public function index($id){
$user = User::find($id);
return view('users.index')->with('user', $user);
}//endFunction
}//endClass