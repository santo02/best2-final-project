<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class AddCompany extends Controller
{
    public function index()
    {
        $posts = Company::all()->toArray();
        return array_reverse($posts);
    }

   
    public function store(Request $request)
    {
       
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png|max:2048'
         ]);
 
         $fileUpload = new Company;

         if($request->file()) {
             $file_name = time().'_'.$request->file->getClientOriginalName();
             $file_path = $request->file('file')->move(public_path('company'), $file_name);
             $fileUpload->company_name= $request->input('company_name');
             $fileUpload->company_image = time().'_'.$request->file->getClientOriginalName();
            //  $fileUpload->company_image = $request->input('company_image');


             $fileUpload->save();
             return response()->json(['success'=>'Add Company successfully.']);
         }
    }

    public function show()
    {
        
    }

    public function update()
    {
       
    }

    
    public function destroy()
    {
        
    }
}
