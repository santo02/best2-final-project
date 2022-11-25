<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index()
    {
        $komen_data = Comment::all();
        return $komen_data;

    }
 
    public function show($id)
    {
        $post_data = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->where('comments.post_id', '=', $id)
            ->get();
        return response()->json($post_data);
    }

    public function store(Request $request)
    {
        $commentData = $request->validate([
            'comment' => ['required'],
            'userId' => ['required'],
            'postId' => ['required']
        ]);
        if(!$commentData) {
            return response()->json('Error');
        } else {
            $post_id = $request->input('postId');
            $user_id = $request->input('userId');
            $komen = $request->input('comment');
            $values = array('post_id' => $post_id,'user_id' => $user_id, 'komen' => $komen);
            $upload_komen = DB::table('comments')->insert($values);
            return response()->json($upload_komen);
        }
    }

    public function update(Request $request, $id)
    {
        $article = Comment::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Comment::findOrFail($id);
        $article->delete();

        return 204;
    }
}
