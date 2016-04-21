<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\user;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
	

    public function postSignUp(Request $request){
		
		$this->validate($request,[
			'email'=>'required|email|unique:users',
			'first_name'=>'required|max:50',
			'password'=>'required|min:4',
		]);
		
		$email = $request['email'];
		$first_name = $request['first_name'];
		$password = bcrypt($request['password']);
		
		$user = new user();
		$user->email =  $email;
		$user->first_name = $first_name;
		$user->password = $password;
		
		$user->save();
		
		return redirect()->route('dashboard');
	}
	
	public function postSignIn(Request $request){

		$this->validate($request,[
			'email'=>'required',
			'password'=>'required',
		]);

		if(Auth::attempt(['email' => $request['email'],'password' => $request['password']])){
			return redirect()->route('dashboard');
		}
		return redirect()->back();
	}
	
}


