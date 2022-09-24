<?php

use App\Http\Controllers\Mange\PostController;
use Illuminate\Support\Facades\Route;



Route::resource('posts' , PostController::class);
