<?php

namespace App\Http\Controllers\Mange;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $user = User::findorFail(1);
        Mail::to($user->email)->send(new OrderMail());
        return Helper::response(data: $users ,message: 'all users', status: 201);
    }

    public function user($user_id){
        $user = User::findorFail($user_id);
        return Helper::response(data: $user , message: "One user",status: 201);
    }


}
