<?php

namespace App\Http\Controllers;

use App\Tweet;
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
        /**
         * Get every tweet with their owner
         */
        //$users = User::with('tweets')->get();
        $tweets = Tweet::with('user')->get();
        //error_log($users);

        $max_tweets = config('app.max_tweets');
        if (auth()->guest()) {
            if ($tweets !== NULL) {
                $tweets = $tweets->slice(random_int(0, sizeof($tweets) - $max_tweets), $max_tweets);
            }
        }
        return view('home', ['tweets' => $tweets]);
    }

    public function users()
    {
        return view('users', ['users' => User::all()]);
    }
}
