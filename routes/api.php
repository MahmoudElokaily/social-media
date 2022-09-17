<?php

use App\Http\Controllers\Mange\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// get all
Route::get('categories' , [PostController::class , 'allCategories']);
Route::get('posts' , [PostController::class , 'allPosts']);
Route::get('comments' , [PostController::class , 'allComments']);
Route::get('users' , [PostController::class , 'allUsers']);
Route::get('users' , [PostController::class , 'allUsers']);

//get one
Route::get('category/{id}' , [PostController::class , 'category']);
Route::get('post/{id}' , [PostController::class , 'category']);
Route::get('comment/{id}' , [PostController::class , 'comment']);
Route::get('user/{id}', [PostController::class , 'user']);

// create new
Route::post('addCategory' , [PostController::class , 'createCategory']);
Route::post('addPost' , [PostController::class , 'createPost']);
Route::post('addComment' , [PostController::class , 'createComment']);

// update
Route::put('updateCategory/{id}' , [PostController::class , 'updateCategory']);
Route::put('updatePost/{id}' , [PostController::class , 'updatePost']);
Route::put('updateComment/{id}' , [PostController::class , 'updateComment']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
