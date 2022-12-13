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
        $post = Comment::join('users', 'users.id', '=', 'comments.user_id')
            ->where('comments.post_id', '=', $id)
            ->select('comments.post_id', 'comments.id', 'comments.user_id', 'comments.comments', 'comments.created_at', 'users.username', 'users.name', 'users.image')
            ->orderBy('comments.created_at', 'DESC')
            ->get();
        return response()->json($post);
    }

    public function store(Request $request)
    {
        $commentData = $request->validate([
            'comments' => ['required'],
            'userId' => ['required'],
            'postId' => ['required']
        ]);
        if(!$commentData) {
            return response()->json('Error');
        } else {
            $post_id = $request->input('postId');
            $user_id = $request->input('userId');
            $komen = $request->input('comments');
            $created_at = \Carbon\Carbon::now()->toDateTimeString();
            $updated_at = \Carbon\Carbon::now()->toDateTimeString();
            $values = array('post_id' => $post_id,'user_id' => $user_id, 'comments' => $komen, 'created_at' => $created_at,'updated_at' => $updated_at);
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
