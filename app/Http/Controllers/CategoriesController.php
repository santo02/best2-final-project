<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

  public function ShowByCate($id)
  {
    $post = DB::table('posts')->join('categories', 'categories.id', '=', 'posts.categori_id')->where('posts.categori_id', $id)->get();
    return $post;
  }
  public function ShowCate($id)
  {
    $post = DB::table('categories')->where('id', $id)->get();
    return $post[0]->Categories_name;
  }
  public function CountByCate($id)
  {
    $post = DB::table('posts')->where('posts.categori_id', $id)->count();
    return $post;
  }
  public function show()
  {
    $categories = Category::all();
    return $categories;
  }

  public function CountCate()
  {
    $categories_count = Category::count();
    return $categories_count;
  }

  public function delete($id)
  {
    Category::where('id', $id)->delete();
    return response()->json(['message' => 'Delete berhasil.'], 201);
  }
}
