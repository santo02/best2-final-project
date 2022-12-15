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
        $post = Company::where('companies.id', $query)->first();
        return response()->json($post);
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

    public function update(Request $request)
    {
        $imageData = $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png',
            'company_name' => 'required',
            'company_slug' => 'required',
            'id' => 'required',
         ]);
 
        if(!$imageData) {
            return response()->json('Error');
        } else {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->move(public_path('assets/img/company'), $file_name);
            $company_name = $request->input('company_name');
            $companyId = $request->input('id');
            $company_image = '/assets/img/company/'.$file_name;
            $slug= $request->input('company_slug');
            $updated_at = \Carbon\Carbon::now()->toDateTimeString();
            $result = DB::table('companies')
            ->where('id', $companyId)
            ->update([
                'company_name' => $company_name, 
                'company_slug' => $slug, 
                'company_image' => $company_image,
                'updated_at' => $updated_at
            ]);
            return response()->json($result);
        }
        
    }


    public function delete(Request $request, $id)
    {
        $item = Company::findOrFail($id);
        $item->delete();
        return $item;
    }

}
