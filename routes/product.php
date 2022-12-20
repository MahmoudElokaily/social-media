<?php

use App\Http\Controllers\Mange\ProductController;
use Illuminate\Support\Facades\Route;


Route::resource('products' , ProductController::class);
