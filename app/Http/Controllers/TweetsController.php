<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tweets = Tweet::all();
        return view('tweets', ['tweets' => $tweets, 'comments' => Comment::all()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'topic' => 'required',
            'message' => 'required'
        ]);

        $tweet = new Tweet;
        $tweet->user_id = auth()->id();
        $tweet->topic = $request->input('topic');
        $tweet->message = $request->input('message');
        $tweet->tags = 'sample';
        $tweet->save();

        return redirect('/profile/' . auth()->id())->with('success', 'Tweet created successfully!');
    }

    public function delete($id)
    {
        error_log("deleting tweet: " . $id);
        //Tweet::all()->find($id)->delete();
        Tweet::destroy($id);
        return response()->json([
            'success' => 'Tweet has been deleted!'
        ]);
    }
}
