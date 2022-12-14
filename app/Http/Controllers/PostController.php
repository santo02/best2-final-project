<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
        $post = Post::join('users', 'users.id', '=', 'posts.user_id')
            ->join('companies', 'companies.id', '=', 'posts.company_id')
            ->join('categories', 'categories.id', '=', 'posts.categori_id')
            ->where('companies.company_slug', '=', $query)
            ->select('posts.id', 'posts.slug', 'posts.title', 'posts.preview', 'categories.Categories_name', 'posts.post_image', 'post_detail', 'posts.created_at', 'posts.updated_at', 'users.username', 'users.name', 'users.image')
            ->get();
        return response()->json($post);
    }

    public function mypost($query)
    {
        $post_data = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('categories', 'categories.id', '=', 'posts.categori_id')
            ->where('users.id', '=', $query)
            ->select('posts.id', 'posts.slug', 'posts.title', 'posts.post_image', 'categories.Categories_name', 'posts.post_detail', 'posts.preview', 'posts.created_at', 'posts.updated_at', 'users.username', 'users.name', 'users.image')
            ->get();
        return response()->json($post_data);
    }
    public function singlePost($id)
    {
        $post = Post::where('posts.id', $id)->join('users', 'users.id', '=', 'posts.user_id')->first();
        return response()->json($post);
    }

    public function useid($query)
    {
        $post = Post::where('posts.id', $query)->first();
        return response()->json($post);
    }

    public function search($search, $slug)
    {
        $post_data = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('companies', 'companies.id', '=', 'posts.company_id')
            ->join('categories', 'categories.id', '=', 'posts.categori_id')
            ->where('companies.company_slug', '=', $slug)
            ->where(function ($query) use ($search) {
                $query->where('posts.title', 'LIKE', "%{$search}%")
                    ->orWhere('posts.post_detail', 'LIKE', "%{$search}%")
                    ->orWhere('categories.Categories_name', 'LIKE', "%{$search}%")
                    ->orWhere('users.username', 'LIKE', "%{$search}%");
            })
            ->select('posts.id', 'posts.slug', 'posts.title', 'posts.post_image', 'categories.Categories_name', 'posts.post_detail', 'posts.preview', 'posts.created_at', 'posts.updated_at', 'users.username', 'users.name', 'users.image')
            ->limit(10)
            ->get();
        return response()->json($post_data);
    }

    public function related($currentPost, $category)
    {
        $post_data = DB::table('posts')
            ->join('companies', 'companies.id', '=', 'posts.company_id')
            ->join('categories', 'categories.id', '=', 'posts.categori_id')
            ->where('posts.id', '!=', $currentPost)
            ->where('categories.Categories_name', 'LIKE', "%{$category}%")
            ->select('posts.id', 'posts.slug', 'posts.title', 'posts.post_image', 'companies.company_slug')
            ->limit(4)
            ->get();
        return response()->json($post_data);
    }
    public function AllPost()
    {
        $allPost =  DB::table('posts')
            ->leftjoin('users', 'users.id', '=', 'posts.user_id')
            ->leftjoin('categories', 'categories.id', '=', 'posts.categori_id')
            ->select('posts.*', 'users.username', 'categories.Categories_name')
            ->get();

        return $allPost;
    }
    public function show($slug)
    {
        return Post::join('users', 'users.id', '=', 'posts.user_id')
            ->join('categories', 'categories.id', '=', 'posts.categori_id')
            ->where('posts.slug', $slug)
            ->select('posts.id', 'posts.slug', 'posts.title', 'posts.post_image', 'categories.Categories_name', 'posts.post_detail', 'posts.preview', 'posts.created_at', 'posts.updated_at', 'users.username', 'users.name', 'users.image')
            ->firstorfail();
    }

    public function store(Request $request)
    {
        $imageData = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png',
            'company_id' => 'required',
            'title' => 'required',
            'category' => 'required',
            'post_detail' => 'required',
            'preview' => 'required',
            'user_id' => 'required',
            'slug' => 'required',
        ]);

        if (!$imageData) {
            return response()->json('Error');
        } else {
            $file_name = time() . '_' . $request->file->getClientOriginalName();
            $file_path = $request->file('file')->move(public_path('assets/img/post'), $file_name);
            $companyId = $request->input('company_id');
            $title = $request->input('title');
            $category = $request->input('category');
            $post_image = '/assets/img/post/' . $file_name;
            $post_detail = $request->input('post_detail');
            $preview = $request->input('preview');
            $userId = $request->input('user_id');
            $slug = $request->input('slug');
            $created_at = \Carbon\Carbon::now()->toDateTimeString();
            $updated_at = \Carbon\Carbon::now()->toDateTimeString();
            $values = array('company_id' => $companyId, 'categori_id' => $category, 'title' => $title, 'slug' => $slug, 'post_image' => $post_image, 'post_detail' => $post_detail, 'preview' => $preview, 'user_id' => $userId, 'created_at' => $created_at, 'updated_at' => $updated_at);
            $data_article = DB::table('posts')->insert($values);
            return response()->json($data_article);
        }
    }

    public function update(Request $request)
    {
        $imageData = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png',
            'company_id' => 'required',
            'post_id' => 'required',
            'title' => 'required',
            'category' => 'required',
            'post_detail' => 'required',
            'preview' => 'required',
            'user_id' => 'required',
            'slug' => 'required',
        ]);

        if (!$imageData) {
            return response()->json('Error');
        } else {
            $file_name = time() . '_' . $request->file->getClientOriginalName();
            $file_path = $request->file('file')->move(public_path('assets/img/post'), $file_name);
            $companyId = $request->input('company_id');
            $postId = $request->input('post_id');
            $title = $request->input('title');
            $category = $request->input('category');
            $post_image = '/assets/img/post/' . $file_name;
            $post_detail = $request->input('post_detail');
            $preview = $request->input('preview');
            $slug = $request->input('slug');
            $updated_at = \Carbon\Carbon::now()->toDateTimeString();
            $result = DB::table('posts')
                ->where('posts.id', $postId)
                ->update([
                    'company_id' => $companyId,
                    'categori_id' => $category,
                    'title' => $title,
                    'slug' => $slug,
                    'post_image' => $post_image,
                    'post_detail' => $post_detail,
                    'preview' => $preview,
                    'updated_at' => $updated_at
                ]);
            return response()->json($result);
        }
    }

    public function image(Request $request)
    {
        $imageData = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        if (!$imageData) {
            return response()->json('Error');
        } else {
            $file_name = time() . '_' . $request->file->getClientOriginalName();
            $file_path = pathinfo($file_name, PATHINFO_FILENAME) . "_" . time();
            $image = base64_encode(file_get_contents($request->file->path()));

            $response = Http::asForm()->post(
                'https://api.imgbb.com/1/upload',
                [
                    'key' => '84af2bac888b4dbd2db2cd2d72b0ca8b',
                    'image' => $image,
                    'name' => $file_path
                ]
            );
            return $response->json();
        }
    }

    public function delete(Request $request, $id)
    {
        $article = DB::table('posts')
            ->where('posts.id', $id)
            ->delete();
        $comments = DB::table('comments')
            ->where('post_id', $id)
            ->delete();
        return response()->json(['message' => 'Delete berhasil.'], 201);
    }
}
