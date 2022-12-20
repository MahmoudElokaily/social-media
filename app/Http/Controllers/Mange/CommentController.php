<?php

namespace App\Http\Controllers\Mange;

use App\Helpers\Helper;
use App\Helpers\SaveImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Category;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::all();
        return Helper::response(data: $comments ,message: 'all comments', status: 201);

    }

    public function show($comment_id){
        $comment = Comment::findorFail($comment_id);
        return Helper::response(data: $comment , message: "One comment",status: 201);

    }

    public function store(CommentRequest $request){
        $validated = $request->validated();
        $validated['image'] = SaveImage::SaveImage('image' , 'images/comments');
        $comment = Comment::create($validated);
        return Helper::response(data: $comment ,message: "Comment added Successfully",status: 201);
    }

    public function update(CommentRequest $request , $comment_id){
        $comment = Comment::findorFail($comment_id);
        if (!$comment)
            return "this is no comment with this id";
        $validated = $request->validated();
        $validated['image'] = SaveImage::SaveImage('image' , 'images/comments');
        $comment->update($validated);
        return Helper::response(data: $comment ,message: "Comment is updated",status: 201);
    }

    public function destroy($id)
    {
        Comment::destroy($id);
        return Helper::response(data: $id , message: "Comment is deleted" , status: 201);
    }
}
