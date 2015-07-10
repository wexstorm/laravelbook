<?php

namespace App\Http\Controllers;
use Request;
use App\Models\User;
use App\Models\Post;
class UserController extends Controller
{

	public function getIndex()
	{
		$users = User::paginate(15);
		return view('users.index')->with('users', $users);
	}

	public function getShow()
	{
		$users = User::all();
		echo count($users);
	}

	public function getTimeline($user_id = 0)
	{

		$user = User::find($user_id);
		$posts = $user->posts()->orderBy('updated_at', 'DESC')->get();
		//$posts = Post::where('user_id', '=', $user_id)->get();
		return view('users.timeline')->with('posts', $posts)->with('user', $user);
	}

	public function getFriends()
	{
		$user = Auth::user();
		$friends = $user->friends;
		return view('users.friends')->with('friends', $friends);
	}

	public function getAddfriend($friend_id = 0)
	{
		$user = Auth::user();
		$user->friends()->attach($friend_id);
		return redirect('users/timeline');
	}

	public function getRemovefriend($friend_id = 0)
	{
		$user = Auth::user();
		$user->friends()->detach($friend_id);
		return redirect('users/timeline');
	}
}

















