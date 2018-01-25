<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use App\Tag;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display all the data from database
		//$posts=Post::all();
		//Displays only the data of the loged in user
		$user_id=auth()->user()->id;
		$posts =Post::where('user_id', $user_id)->orderBy('id','desc')->paginate(5);
		//$posts=Post::orderBy('id','desc')->paginate(5);
		return view('posts.index', compact('user', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//we need to read from category table and display it inside create view
		$categories=Category::all();
		//we need to read form tags table too
		$tags=Tag::all();
         //all we need is to display a view or form to the user
		return view("posts.create",compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the form
		$this->validate($request,array(
			'title' => 'required|max:256',
			'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
			'image' => 'required|image',
			'category_id' => 'required|integer',
			'body' => 'required',
			'g-recaptcha-response' => 'required|captcha'
		));
		//Store into the database
		$post=new Post;
		$post->title = $request->title;
		$post->slug = $request->slug;
		$post->category_id=$request->category_id;
		$post->body = Purifier::clean($request->body);
		//takes the id of the loged in user and save it in database
		$post->user_id=auth()->user()->id;
		//uploading image
		if($request->hasFile('image')){
			$image=$request->file('image');
			$filename=time(). '.' . $image->getClientOriginalExtension();
			$location=public_path('images/'.$filename);
			Image::make($image)->resize(800,400)->save($location);

			$post->image=$filename;
		}

		$post->save();
		//use sync to make the many to many relationship
		$post->tags()->sync($request->tags,false);
		//Session
		Session::flash('success', 'Blog Added Successfully!');

		//Redirected to another page
		return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show a spicific data from database
		$post=Post::find($id);
		//check for authorized users
		if(auth()->user()->id != $post->user_id){
			Session::Flash('danger','Unauthorized Page');
			return redirect()->route('posts.index');
		}
		if(empty($id)){
			Session::Flash('danger','Unauthorized Page');
			return redirect()->route('posts.index');
		}

		return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the model in database and save it in a variable
		$post=Post::find($id);

		//check for authorized users
		if(auth()->user()->id != $post->user_id){
			Session::Flash('danger','Unauthorized Page');
			return redirect()->route('posts.index');
		}
		//$categories=Category::all();
//		$cats=array();
//		foreach ($categories as $category) {
//			$cats[$category->id]=$category->name;
//		}
		$cats=Category::pluck('name','id');
		$tags=Tag::pluck('name','id');
		// return a view and pass the variable
		return view('posts.edit', compact('post','cats', 'tags'));
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
		$post=Post::find($id);
		$slugdb=$post->slug;
	   $slugin=$request->input('slug');
		if($slugdb == $slugin){
	    $this->validate($request,[
		  'title' => 'required|max:255',
		   'slug' => 'required|alpha_dash|min:5|max:255',
		   'category_id' => 'required|integer',
		   'body' => 'required',
			'image' => 'image'
	   	]);
		}
		else{
		$this->validate($request,[
		  'title' => 'required|max:255',
		   'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug, $id",
		   'category_id' => 'required|integer',
		   'body' => 'required',
			'image' => 'image'
	   	]);
		}

       $post=Post::find($id);
	   $post->title=$request->input('title');
	   $post->slug=$request->input('slug');
	   $post->category_id=$request->input('category_id');
	   $post->body=Purifier::clean($request->input('body'));

		//uploading image
		if($request->hasFile('image')){
			$image=$request->file('image');
			$filename=time(). '.' . $image->getClientOriginalExtension();
			$location=public_path('images/'.$filename);
			Image::make($image)->save($location);
			//taking the old image
			$oldimage=$post->image;
			//updating the new image
			$post->image=$filename;
			//deleteing the old image
			Storage::delete($oldimage);
		}

	   $post->save();

		//update the sync relationship
	  $post->tags()->sync($request->tags);

	   Session::Flash('success','Successfully Updated');

	   return redirect()->route('posts.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
		//check for authorized users
		if(auth()->user()->id != $post->user_id){
			Session::Flash('danger','Unauthorized Page');
			return redirect()->route('posts.index');
		}

		//removing manay to many relationships
		$post->tags()->detach();
		//Delete the image form the folder
		Storage::delete($post->image);
		$post->delete();

		Session::Flash('success','Successfully Deleted');

		return redirect()->route('posts.index');
    }
}
