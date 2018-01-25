<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;
use Purifier;

class CommentController extends Controller
{
  
	
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email',
			'comment' => 'required'
		]);
		
		$post=Post::find($post_id);
		
        $comment=new Comment;
		$comment->name=$request->name;
		$comment->email=$request->email;
		$comment->comment=Purifier::clean($request->comment);
		$comment->approved=true;
		$comment->post()->associate($post);
		
		$comment->save();
			
		Session::flash('success', 'Comment Added Successfully');
		return redirect()->route('blog.single', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment=Comment::find($id);
		return view('comments.edit', compact('comment'));
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
        $comment=Comment::find($id);
		$comment->comment=Purifier::clean($request->comment);
		
		$comment->save();
		
		Session::flash('success', 'Successfully Updated');
		return redirect()->route('posts.show', $comment->post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::find($id);
		$comment->delete();
		
		Session::flash('success', 'Successfully Deleted');
		return redirect()->route('posts.show', $comment->post->id);
    }
}
