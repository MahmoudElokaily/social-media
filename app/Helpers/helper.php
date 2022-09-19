<?php

namespace App\Helpers;

class Helper {
    public static function response($data = [] , $message = '' , $status){
        $response = [
            'date' => $data,
            'message' => $message,
        ];
        return response()->json($response , $status);
    }
}
