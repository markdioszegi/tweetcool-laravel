<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->message = $request->message;
        $comment->tweet_id = $request->tweet_id;
        $comment->user_id = $request->user_id;

        if ($comment->save()) {
            return true;
        }
        return false;
    }
}
