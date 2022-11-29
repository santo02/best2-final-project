<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
  public function store(Request $request)
  {
    $request->validate([
      'Categories_name' => 'required',
      'slug' => 'required',
    ]);

    Category::create($request->all());
  }

  public function show(){
    $categories = Category::all();
    return $categories;
  }

  public function CountCate(){
    $categories_count = Category::count();
    return $categories_count;
  }

  public function delete($id){
    Category::where('id', $id)->delete();
    return response()->json('Category deleted!');
  }
}
