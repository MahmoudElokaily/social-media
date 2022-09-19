<?php

namespace App\Http\Controllers\Mange;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostsRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return Helper::response(data: $posts ,message: 'all Posts', status: 201);
    }

    public function post($post_id){
        $post = Post::find($post_id)->load('comments');
        return Helper::response(data: $post , message: "One post with his comments",status: 201);
    }

    public function store(PostsRequest $request){
        $validated = $request->validated();
        $post = Post::create([
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'user_id' => $validated['user_id'],
        ]);
        return Helper::response(data: $post ,message: "Post added Successfully",status: 201);
    }

    public function update(PostsRequest $request , $post_id){
        $post = Post::find($post_id);
        if (!$post)
            return "this is no post with this id";
        $validated = $request->validated();
        $post->update($validated);
        return Helper::response(data: $post ,message: "Post is updated",status: 201);
    }


}

