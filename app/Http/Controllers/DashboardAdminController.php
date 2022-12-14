<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
  public function UserCount(){
    $Totaluser= User::where('role', 'user')->count();
    return $Totaluser;
   }

   public function PostCount(){
     $TotalPost =DB::table('posts')->select('id')->count();
     return $TotalPost;
   }

   public function CompanyCount(){
     $TotalCompany = DB::table('companies')->select('id')->count();
     return $TotalCompany;
   }

}
