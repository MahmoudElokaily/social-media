<?php

use App\Http\Controllers\Mange\OrderController;
use App\Http\Controllers\Mange\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('users' , UserController::class);
