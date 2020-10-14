<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Mail;
use Session;
use Auth;

class PagesController extends Controller {


	

	public function getIndex() {

		
		
		// $posts = Post::orderBy('created_at', 'desc')->get();

		$posts=Post::orderBy('created_at','desc')->simplePaginate(5);
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout() {

	


		$first = 'mehraj';
		$last = 'ud din';

		$fullname = $first . " " . $last;
		$email = 'bhat299@gmail.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}

	public function getContact() {
		return view('pages.contact');
	}


	public function postContact(Request $request){
		$this->validate($request, [
			'email'=>'required|email',
			'message'=>'min:5',
			'subject'=>'min:3'
			]);

			$data=[
				'email'=>$request->email,
				'subject'=>$request->subject,
				'bodyMessage'=>$request->message
			];

			Mail::send('emails.send',$data,function($message) use ($data){
				$message->from($data['email']);
				$message->to('bhat299@gmail.com');
				$message->subject($data['subject']);
			});

			Session::flash('Success', 'Email has been Successfully sent !');

			return redirect('/');


	}

	// public function postContact(Request $request) {
	// 	$this->validate($request, [
	// 		'email' => 'required|email',
	// 		'subject' => 'min:3',
	// 		'message' => 'min:10']);

	// 	$data = array(
	// 		'email' => $request->email,
	// 		'subject' => $request->subject,
	// 		'bodyMessage' => $request->message
	// 		);

		// Mail::send('emails.contact', $data, function($message) use ($data){
		// 	$message->from($data['email']);
		// 	$message->to('hello@devmarketer.io');
		// 	$message->subject($data['subject']);
		// });

		// Session::flash('success', 'Your Email was Sent!');

		// return redirect('/');
	


}