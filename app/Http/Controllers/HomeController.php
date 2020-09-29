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
        $max_tweets = config('app.max_tweets');

        if (auth()->guest()) {
            //if ($tweets !== NULL) {
            $tweets = Tweet::with('user')->inRandomOrder()->limit($max_tweets)->get();
            //}
        } else {
            $tweets = Tweet::with('user')->paginate();
        }
        return view('home', ['tweets' => $tweets]);
    }

    public function users()
    {
        return view('users', ['users' => User::all()]);
    }
}
