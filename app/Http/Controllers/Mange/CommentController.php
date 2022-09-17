<?php

namespace App\Http\Controllers\Mange;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function allComments(){
        return Comment::all();
    }

    public function comment($comment_id){
        return Comment::find($comment_id);
    }

    public function store(CommentRequest $request){
        $validated = $request->validated();
        Comment::create([
            'content' => $validated['content'],
            'post_id' => $validated['post_id'],
            'user_id' => $validated['user_id'],
        ]);
        return "Comment is published";
    }

    public function update(CommentRequest $request , $comment_id){
        $comment = Comment::find($comment_id);
        if (!$comment)
            return "this is no comment with this id";
        $validated = $request->validated();
        $comment->update($validated);
        return "Comment is updated";
    }
}
