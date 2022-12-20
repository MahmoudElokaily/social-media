<?php

use App\Http\Controllers\Mange\OrderController;
use Illuminate\Support\Facades\Route;


Route::resource('orders' , OrderController::class);
