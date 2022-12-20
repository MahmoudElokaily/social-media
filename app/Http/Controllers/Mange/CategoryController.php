<?php

namespace App\Http\Controllers\Mange;

use App\Helpers\Helper;
use App\Helpers\SaveImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return Helper::response(data: $categories ,message: 'all Categories', status: 201);
    }

    public function show($category_id){
        $category = Category::findorFail($category_id)->load('posts');
        return Helper::response(data: $category , message: "One category with his posts",status: 201);
    }

    public function store(CategoryRequest $request){
        $validated = $request->validated();
        $validated['image'] = SaveImage::SaveImage('image' , 'images/category');
        $category = Category::create($validated);
        return Helper::response(data: $category ,message: "Category added Successfully",status: 201);
    }

    public function update(CategoryRequest $request , $category_id){
        $category = Category::findorFail($category_id);
        if (!$category)
            return "this is no category with this id";
        $validated = $request->validated();
        $category->update($validated);
        return Helper::response(data: $category ,message: "Category is updated",status: 201);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return Helper::response(data: $id , message: "Category is deleted" , status: 201);
    }
}
