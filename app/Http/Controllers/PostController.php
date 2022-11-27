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

    public function indextwo($query)
    {
        $post_data = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('companies', 'companies.company_id', '=', 'posts.company_id')
            ->where('companies.company_slug', '=', $query)
            ->get();
        return response()->json($post_data);

    }

    public function mypost($query)
    {
        $post_data = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->where('users.id', '=', $query)
            ->get();
        return response()->json($post_data);

    }

    public function useid($query)
    {
        $post = Post::where('post_id', $query)->first();
        return response()->json($post);

    }

    public function search($query, $slug)
    {
        $post_data = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('companies', 'companies.company_id', '=', 'posts.company_id')
            ->where('companies.company_slug', '=', $slug)
            ->where('posts.title', 'LIKE', "%{$query}%")
            // ->orWhere('posts.post_detail', 'LIKE', "%{$query}%")
            ->orWhere('posts.category', 'LIKE', "%{$query}%")
            // ->orWhere('users.username', 'LIKE', "%{$query}%")
            ->get();
        return response()->json($post_data);
    }

    public function related($currentPost, $category)
    {
        $post_data = DB::table('posts')
            ->join('companies', 'companies.company_id', '=', 'posts.company_id')
            ->where('posts.post_id', '!=', $currentPost)
            ->where('posts.category', 'LIKE', "%{$category}%")
            ->select('posts.post_id', 'posts.slug', 'posts.title', 'post_image', 'companies.company_slug')
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
        $imageData = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:2048',
            'company_id' => 'required',
            'title' => 'required',
            'category' => 'required',
            'post_detail' => 'required',
            'user_id' => 'required',
            'slug' => 'required',
         ]);
 
        if(!$imageData) {
            return response()->json('Error');
        } else {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->move(public_path('assets/img/post'), $file_name);
            $companyId = $request->input('company_id');
            $title = $request->input('title');
            $category = $request->input('category');
            $post_image = '/assets/img/post/'.$file_name;
            $post_detail = $request->input('post_detail');
            $userId = $request->input('user_id');
            $slug= $request->input('slug');
            $values = array('company_id' => $companyId,'title' => $title, 'slug' => $slug, 'category' => $category,'post_image' => $post_image, 'post_detail' => $post_detail, 'user_id' => $userId);
            $data_article = DB::table('posts')->insert($values);
            return response()->json($data_article);
        }
        
    }

    public function update(Request $request, $id)
    {
        $article = Post::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = DB::table('posts')
            ->where('post_id',$id)
            ->delete();
        $comments = DB::table('comments')
            ->where('post_id',$id)
            ->delete();
        return response()->json("Berhasil hapus");

        return 204;
    }
}
