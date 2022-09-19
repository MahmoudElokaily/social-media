<?php

namespace App\Http\Controllers\Mange;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::all();
        return Helper::response(data: $comments ,message: 'all comments', status: 201);

    }

    public function comment($comment_id){
        $comment = Comment::find($comment_id);
        return Helper::response(data: $comment , message: "One comment",status: 201);

    }

    public function store(CommentRequest $request){
        $validated = $request->validated();
        $comment = Comment::create([
            'content' => $validated['content'],
            'post_id' => $validated['post_id'],
            'user_id' => $validated['user_id'],
        ]);
        return Helper::response(data: $comment ,message: "Comment added Successfully",status: 201);
    }

    public function update(CommentRequest $request , $comment_id){
        $comment = Comment::find($comment_id);
        if (!$comment)
            return "this is no comment with this id";
        $validated = $request->validated();
        $comment->update($validated);
        return Helper::response(data: $comment ,message: "Comment is updated",status: 201);
    }
}
