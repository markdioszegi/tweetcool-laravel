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

    public function delete($id) {
        Comment::destroy($id);
        return response()->json([
            'success' => 'Comment has been deleted!',
        ]);
    }

    public function update(Request $request)
    {
        $comment = Comment::find($request->id);
        if ($comment) {
            $comment->message = $request->message;
            $comment->save();

            return response()->json([
                'success' => 'Comment has been updated!',
            ]);
        } else {
            return false;
        }
    }
}
