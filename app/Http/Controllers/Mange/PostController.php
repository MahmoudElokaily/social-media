<?php

namespace App\Http\Controllers\Mange;

use App\Helpers\Helper;
use App\Helpers\SaveImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use App\Models\Category;
use App\Models\Post;


class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return Helper::response(data: $posts ,message: 'all Posts', status: 201);
    }

    public function show($post_id){
        $post = Post::findorFail($post_id)->load('comments');
        return Helper::response(data: $post , message: "One post with his comments",status: 201);
    }

    public function store(PostsRequest $request){
        $validated = $request->validated();
        $validated['image'] = SaveImage::SaveImage('image' , 'images/posts');
        $post = Post::create($validated);
        return Helper::response(data: $post ,message: "Post added Successfully",status: 201);
    }

    public function update(PostsRequest $request , $post_id){
        $post = Post::findorFail($post_id);
        if (!$post)
            return "this is no post with this id";
        $validated = $request->validated();
        $post->update($validated);
        return Helper::response(data: $post ,message: "Post is updated",status: 201);
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return Helper::response(data: $id , message: "Post is deleted" , status: 201);
    }

}

