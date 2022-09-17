<?php

namespace App\Http\Controllers\Mange;

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
    public function allPosts(){
        $posts = Post::all();
        return $posts;
    }

    public function post($post_id){
        $post = Post::find($post_id)->load('comments');
        return $post;
    }

    public function store(PostsRequest $request){
        $validated = $request->validated();
        Post::create([
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'user_id' => $validated['user_id'],
        ]);
        return "Post is published";
    }

    public function update(PostsRequest $request , $post_id){
        $post = Post::find($post_id);
        if (!$post)
            return "this is no post with this id";
        $validated = $request->validated();
        $post->update($validated);
        return "Post is updated";
    }


}

