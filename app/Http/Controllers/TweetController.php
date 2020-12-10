<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
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

    public function edit($id)
    {
        $tweet = Tweet::find($id);
        if ($tweet && $tweet->user_id == auth()->id()) {
            return view('edit_tweet')->with('tweet', $tweet);
        }
        abort(403);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'topic' => 'required|max:' . config('app.max_topic_len'),
            'message' => 'required|max:'  . config('app.max_message_len'),
        ]);

        $tweet = Tweet::find($id);
        if ($tweet) {
            $tweet->topic = $request->input('topic');
            $tweet->message = $request->input('message');
            $tweet->save();

            return redirect('/profile/' . auth()->id())->with('success', "Tweet edited successfully!");
        } else {
            return false;
        }
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
            'topic' => 'required|max:' . config('app.max_topic_len'),
            'message' => 'required|max:'  . config('app.max_message_len'),
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
        Tweet::destroy($id);
        return response()->json([
            'success' => 'Tweet has been deleted!'
        ]);
    }
}
