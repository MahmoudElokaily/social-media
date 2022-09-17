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
    public function allCategories(){
        $categories = Category::all();
        return $categories;
    }

    public function category($category_id){
        $category = Category::find($category_id)->load('posts');
        return $category;
    }

    public function allPosts(){
        $posts = Post::all();
        return $posts;
    }

    public function post($post_id){
        $post = Post::find($post_id)->load('comments');
        return $post;
    }

    public function allComments(){
        return Comment::all();
    }

    public function allUsers(){
        return User::all();
    }

    public function comment($comment_id){
        return Comment::find($comment_id);
    }

    public function user($user_id){
        return User::find($user_id);
    }

    

    public function createCategory(CategoryRequest $request){
        $validated = $request->validated();
        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);
        return "Category added Successfully";
    }

    public function createPost(PostsRequest $request){
        $validated = $request->validated();
        Post::create([
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'user_id' => $validated['user_id'],
        ]);
        return "Post is published";
    }

    public function createComment(CommentRequest $request){
        $validated = $request->validated();
        Comment::create([
            'content' => $validated['content'],
            'post_id' => $validated['post_id'],
            'user_id' => $validated['user_id'],
        ]);
        return "Comment is published";
    }

    public function updateCategory(CategoryRequest $request , $category_id){
        $category = Category::find($category_id);
        $validated = $request->validated();
        $category->update($validated);
        return "Category is updated";
    }

    public function updatePost(PostsRequest $request , $post_id){
        $post = Post::find($post_id);
        $validated = $request->validated();
        $post->update($validated);
        return "Post is updated";
    }

    public function updateComment(CommentRequest $request , $comment_id){
        $comment = Comment::find($comment_id);
        $validated = $request->validated();
        $comment->update($validated);
        return "Comment is updated";
    }
}

