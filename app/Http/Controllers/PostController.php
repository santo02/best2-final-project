<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $post_data = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->get();
        return response()->json($post_data);

    }

    public function search($query)
    {
        $post_data = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->where('posts.title', 'LIKE', "%{$query}%")
            ->orWhere('posts.post_detail', 'LIKE', "%{$query}%")
            ->orWhere('posts.category', 'LIKE', "%{$query}%")
            ->orWhere('users.username', 'LIKE', "%{$query}%")
            ->get();
        return response()->json($post_data);
    }

    public function related($currentPost, $category)
    {
        $post_data = DB::table('posts')
            ->where('posts.post_id', '!=', $currentPost)
            ->where('posts.category', 'LIKE', "%{$category}%")
            ->select('posts.post_id', 'posts.slug', 'posts.title', 'post_image')
            ->limit(4)
            ->get();
        return response()->json($post_data);
    }

    public function show($slug)
    {
        return Post::join('users', 'users.id', '=', 'posts.user_id')
            ->where('slug', $slug)->firstorfail();
    }

    public function store(Request $request)
    {
        return Post::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Post::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Post::findOrFail($id);
        $article->delete();

        return 204;
    }
}
