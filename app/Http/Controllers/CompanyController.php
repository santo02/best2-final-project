<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $post_data = DB::table('companies')
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

    public function show($query)
    {
        $post_data = DB::table('companies')
            ->where('companies.company_name', 'LIKE', "%{$query}%")
            ->orWhere('companies.company_slug', 'LIKE', "%{$query}%")
            ->get();
        return response()->json($post_data);
    }

    public function store(Request $request)
    {
        $imageData = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png',
            'company_name' => 'required',
            'slug' => 'required',
         ]);
 
        if(!$imageData) {
            return response()->json('Error');
        } else {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->move(public_path('assets/img/company'), $file_name);
            $company_name = $request->input('company_name');
            $post_image = '/assets/img/company/'.$file_name;
            $slug= $request->input('slug');
            $created_at = \Carbon\Carbon::now()->toDateTimeString();
            $updated_at = \Carbon\Carbon::now()->toDateTimeString();
            $values = array('company_name' => $company_name,'company_slug' => $slug, 'company_image' => $post_image, 'created_at' => $created_at, 'updated_at' => $updated_at);
            $data_company = DB::table('companies')->insert($values);
            return response()->json($data_company);
        }
        
    }

    public function update(Request $request, $id)
    {
        $article = Company::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Company::findOrFail($id);
        $article->delete();

        return 204;
    }
}
