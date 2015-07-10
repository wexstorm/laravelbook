<?php

namespace App\Http\Controllers;
use Request;
use Auth;
use Hash;
use App\Models\Post;
use App\Models\User;

class LoginController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', ['only'=>'getDashboard']);
	}

	public function getIndex()
	{
		return redirect('login/login');
	}

	public function getLogin()
	{
		return view('login/login');
	}

	public function postLogin()
	{
		$username = Request::input('username');
		$password = Request::input('password');
		if (Auth::attempt(
			array(
				'username'=>$username,
				'password'=>$password
			)
		))
		{
			// Login okay!
			$user = Auth::user();
			return redirect('users/timeline/'.$user->id);
		}
		else
		{
			// Login nicht okay
			return redirect('login/login');
		}

	}

}








