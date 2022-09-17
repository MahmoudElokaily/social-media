<?php

namespace App\Http\Controllers\Mange;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function allUsers(){
        return User::all();
    }

    public function user($user_id){
        return User::find($user_id);
    }
}
