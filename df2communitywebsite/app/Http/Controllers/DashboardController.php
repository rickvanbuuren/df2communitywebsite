<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user_role = auth()->user()->role;

        if($user_role == "admin"){
            $posts = Post::orderBy('created_at', 'desc')->get();
            return view('dashboard')->with('posts', $posts);
        }else{
            return view('dashboard')->with('posts', $user->posts);
        }
    }
}
