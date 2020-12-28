<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $category = Category::all();
        return response(['Categories' => $category, 'Message' => 'Retrived Successfully'], 200);
    }

    public function store(Request $req)
    {
        $validate = $req->validate([
            'name' => ['required'],
        ]);

        $category = Category::create($validate);
        return response(['Categories' => new CategoryResource($category), 'Message' => 'Created Successfully'], 200);
    }

    public function show(Category $category)
    {
        return response(['Categories' => new CategoryResource($category), 'Message' => 'Retrieved Successfully'], 200);
    }

    public function update(Request $req, Category $category)
    {
        dd($category);
    }

    public function destroy(Category $category)
    {
        dd($category);
    }
}
