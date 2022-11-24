<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
// use App\Http\Requests\StorePostRequest;
// use App\Http\Resources\PostResource;

class AddBlog extends Controller
{
    public function index()
    {
        $posts = Post::all()->toArray();
        return array_reverse($posts);
    }


    public function store(Request $request){

        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:2048'
         ]);
 
         $fileUpload = new Post;

         if($request->file()) {
             $file_name = time().'_'.$request->file->getClientOriginalName();
             $file_path = $request->file('file')->move(public_path('blog'), $file_name);
             $fileUpload->company_id = $request->input('company_id');
             $fileUpload->title = $request->input('title');
             $fileUpload->category = $request->input('category');
             $fileUpload->post_image = time().'_'.$request->file->getClientOriginalName();
             $fileUpload->post_detail = $request->input('post_detail');
             $fileUpload->user_id = $request->input('user_id');
             $fileUpload->slug= $request->input('slug');
             $fileUpload->save();
             return response()->json(['success'=>'Add Blog successfully.']);
         }
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    // public function update(StorePostRequest $request, Post $post)
    // {
    //     $post->update($request->all());
        
    //     return new PostResource($post);
    // }

    
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json('Post deleted!');
    }
}
