<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Tweet;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tweets = Tweet::all();
        $max_tweets = config('app.max_tweets');
        if(auth()->guest()) {
            $tweets = $tweets->slice(random_int(0, sizeof($tweets) - $max_tweets), $max_tweets);
        }
        return view('home', ['tweets'=>$tweets, 'comments'=>Comment::all()]);
    }

    public function users(){
        return view('users', ['users'=>User::all()]);
    }

    public function profile(){
        return view('profile');
    }
}
