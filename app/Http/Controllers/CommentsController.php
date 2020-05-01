<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller{
	public function store(Request $request){
		$this->validate($request, [
			'comment' => 'required'
		]);
		$comment = new Comment();
		$comment->content = $request->comment;
		$comment->userid = Auth::user()->id;
		$comment->postid = $request->postid;
		$comment->save();
		return redirect("posts/$request->postid");
	}//endFunction
}//endClass