<?php

use App\Http\Controllers\Mange\CommentController;
use Illuminate\Support\Facades\Route;



Route::resource('comments' , CommentController::class);
