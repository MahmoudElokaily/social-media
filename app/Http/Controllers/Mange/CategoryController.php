<?php

namespace App\Http\Controllers\Mange;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories(){
        $categories = Category::all();
        return $categories;
    }

    public function category($category_id){
        $category = Category::find($category_id)->load('posts');
        return $category;
    }

    public function store(CategoryRequest $request){
        $validated = $request->validated();
        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);
        return "Category added Successfully";
    }

    public function update(CategoryRequest $request , $category_id){
        $category = Category::find($category_id);
        if (!$category)
            return "this is no category with this id";
        $validated = $request->validated();
        $category->update($validated);
        return "Category is updated";
    }
}
