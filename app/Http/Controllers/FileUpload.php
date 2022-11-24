<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class FileUpload extends Controller
{
    
      public function upload(Request $request){
            
            $request->validate([
               'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
            ]);
    
            $fileUpload = new Post;

            if($request->file()) {
                $file_name = time().'_'.$request->file->getClientOriginalName();
                $file_path = $request->file('file')->storeAs('upload/thumbnail', $file_name, 'public');
    
                $fileUpload->company_id = 1;
                $fileUpload->title = 'test';
                $fileUpload->category = 1;
                $fileUpload->post_image = time().'_'.$request->file->getClientOriginalName();
                $fileUpload->post_detail = 'test';
                $fileUpload->user_id = 1;
                $fileUpload->slug = 'test';
                $fileUpload->save();
                return response()->json(['success'=>'File uploaded successfully.']);
    
            }
       }
}

