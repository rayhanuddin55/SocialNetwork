<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
	public function getDashboard(){

		$posts = Post::all();
		return view('dashboard', ['posts' => $posts]);
	}

	public function postCreatePost(Request $request){

		$this->validate($request,[
			'body'=>'required|max:1000',
			
		]);

		$post = new Post();
		$post->body = $request['body'];
		if($request->user()->posts()->save($post)){
			$message = 'post successfully created';
		}
		return redirect()->route('dashboard')->with(['message' => $message]);
	}
}