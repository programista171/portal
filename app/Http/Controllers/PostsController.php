<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use App\Reaction;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(){
		//$posts = Post::get()->paginate(2);
		$posts = Post::orderBy('created_at', 'desc')->get();
		//$posts = Post::paginate(20);

		return view('posts.index')->with('posts', $posts);
	}//endFunction

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function create(){
		return view('posts.create');
	}//endFunction


	public function createPost(Request $request){
		$this->validate($request, [
			'content' => 'required'
		]);

		$post = new Post();
		$post->content = $request->input('content');
		$post->userid = auth()->user()->id;
		$post->save();

		return redirect('/posts')->with('success', 'Post szczęśliwie dodany! Happy coding!');
	}//endFunction

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function show($id){
		$entry = Post::find($id);
		//$comments = Comment::all();
		$comments = $entry->comments;
		return view('posts.show')->with('entry', $entry)->with('comments', $comments);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
}//endFunction

	public function createComment(Request $request){
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


	public function react(){
$ispositive = false;
if($request->input('reaction') == 'like')
$ispositive = true;

Reaction::create([
'userid'=>Auth::user()->id,
'postid'=>$request->input('post_id'),
'ispositive'=>$ispositive
]);
	}//endFunction
}//endClass