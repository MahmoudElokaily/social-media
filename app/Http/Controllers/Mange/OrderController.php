<?php

namespace App\Http\Controllers\Mange;

use App\Events\CreateOrder;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index (){
        $orders = Order::all();
        return Helper::response(data: $orders , message: 'all Orders', status: 201);
    }

    public function show($order_id){
        $order = Order::findorFail($order_id);
        return Helper::response(data: $order , message: "One Order with his posts",status: 201);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'string|required|max:30',
            'total' => 'required|numeric',
            'user_id' => 'required'
        ]);
        $order = Order::create($validated);
        return Helper::response(data: $order ,message: "Order added Successfully",status: 201);
    }

    public function update(Request $request , $order_id){
        $validated = $request->validate([
            'name' => 'max:30|string',
            'total' => 'numeric'
        ]);
        $Order = Order::findorFail($order_id);
        if (!$Order)
            return "this is no Order with this id";
        $Order->update($validated);
        return Helper::response(data: $Order ,message: "Order is updated",status: 201);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return Helper::response(data: $id , message: "Order is deleted" , status: 201);
    }

}
