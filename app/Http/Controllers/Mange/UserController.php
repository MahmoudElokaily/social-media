<?php

namespace App\Http\Controllers\Mange;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return Helper::response(data: $users ,message: 'all users', status: 201);
    }

    public function user($user_id){
        $user = User::find($user_id);
        return Helper::response(data: $user , message: "One user",status: 201);

    }
}
