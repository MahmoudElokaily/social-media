<?php

namespace App\Http\Controllers\Mange;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index (){
        $products = Product::all();
        return Helper::response(data: $products , message: 'all Product', status: 201);
    }

    public function show($product_id){
        $products = Product::findorFail($product_id);
        return Helper::response(data: $products , message: "One Product with his posts",status: 201);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'string|required|max:30',
            'price' => 'required',
        ]);
        $products = Product::create($validated);
        return Helper::response(data: $products ,message: "Product added Successfully",status: 201);
    }

    public function update(Request $request , $product_id){
        $validated = $request->validate([
            'name' => 'max:30|string',
            'price' => 'numeric'
        ]);
        $products = Product::findorFail($product_id);
        if (!$products)
            return "this is no product with this id";
        $products->update($validated);
        return Helper::response(data: $products ,message: "Product is updated",status: 201);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return Helper::response(data: $id , message: "Product is deleted" , status: 201);
    }
}
