<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * @param Request $request
     * @param Comment
     * @param int
     * @param int
     *
     * @return void
     */
    public function add(
        Request $request, 
        Comment $comment, 
        $userId, 
        $postId
    )
    {
        $request->validate(
            ['comment' => 'required|string|max:1000']
        );

        $comment->comment = $request->input('comment');
        $comment->user_id = $userId;
        $comment->post_id = $postId;

        $comment->save();

        return redirect()->back();
    }

    
}