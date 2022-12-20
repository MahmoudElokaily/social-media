<?php


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

//// get all
//Route::get('categories' , [CategoryController::class , 'index']);
//Route::get('posts' , [PostController::class , 'index']);
//Route::get('comments' , [CommentController::class , 'index']);
//Route::get('users' , [UserController::class , 'index']);
//
////get one
//Route::get('category/{id}' , [CategoryController::class , 'category']);
//Route::get('post/{id}' , [PostController::class , 'post']);
//Route::get('comment/{id}' , [CommentController::class , 'comment']);
//Route::get('user/{id}', [UserController::class , 'user']);
//
//// create new
//Route::post('add-category' , [CategoryController::class , 'store']);
//Route::post('add-post' , [PostController::class , 'store']);
//Route::post('add-comment' , [CommentController::class , 'store']);
//
//// update
//Route::put('update-category/{id}' , [CategoryController::class , 'update']);
//Route::put('update-post/{id}' , [PostController::class , 'update']);
//Route::put('update-comment/{id}' , [CommentController::class , 'update']);
//



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
