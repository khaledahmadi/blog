<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{
    //Home
	public function getIndex(){
		$posts=Post::orderBy('id','desc')->limit(4)->get();
		return view('pages.index',compact('posts'));
	}
	
	public function getAbout(){
		$fullname="Khalid Ahmadi";
		$email="khaledahmadi556@gmail.com";
		return view('pages.about',compact('fullname','email'));
	}
	
	public function getContact(){
		return view('pages.contact');
	}
	
	public function postContact(Request $request){
		$this->validate($request, [
			'email' => 'required|email',
			'msg' => 'required|min:10',
			'subject' => 'required|min:3'
		]);
		
		$data = array(
			'email' => $request->email,
			'bodyMessage' => $request->msg,
			'subject' => $request->subject
		);
		
		Mail::send('emails.contact', $data, function($message) use($data){
			$message->from($data['email']);
			$message->to('khaledahmadi556@gmail.com');
			$message->subject($data['subject']);
		});
		
		Session::flash('success', 'Email Sent Successfully');
		//return view('pages.contact');
		return redirect('/');
	}
	
}
