<?php
/*code to initialise functions for the view controller*/

namespace App\Http\Controllers;
/*bind the function to current dirrectory*/
use App\Post;

class PagesController extends controller{
	
	public function getIndex() {
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout() {
		$first = 'brian';
		$last = 'kariuki';

		$fullname = $first."  ".$last;
		$email = 'briankariuki285@gmail.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;

		return view ('pages.about')->withData($data);
	}
	public function getContact() {
		return view ('pages.contact');
	}
	public function postContact() {
		
	}
}