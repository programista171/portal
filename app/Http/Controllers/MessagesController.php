<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MessagesController extends Controller
{
    public function index() {
        $friends = Auth::user()->getFriends();
        return View("messages.index")->with("friends", $friends);
    }
}
