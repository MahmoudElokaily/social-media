<?php

use App\Http\Controllers\Mange\CategoryController;
use Illuminate\Support\Facades\Route;


Route::resource('category' , CategoryController::class);
