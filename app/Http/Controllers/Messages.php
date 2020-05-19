<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class Messages extends Controller
{
    public function index() {
        return View("messages.index");
    }
}
