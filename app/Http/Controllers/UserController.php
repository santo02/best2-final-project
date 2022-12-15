<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function registrasi(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:225',
      'username' => 'required|string|max:225',
      'email' => 'required|string|email|max:225|unique:users',
      'password' => 'required|string|confirmed|min:6',
    ]);

    $user = User::create([
      'name' => $request->name,
      'username' => $request->username,
      'email' => $request->email,
      'role' => 'user',
      'is_verified' => false,
      'password' => Hash::make($request->password),
    ]);

    return response()->json(['message' => 'Registration Successful.'], 201);
  }


  public function login(Request $request)
  {
    $credentialsEmail = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required']
    ]);

    if (Auth::attempt($credentialsEmail)) {
      $status = 200;
      $user = Auth::user();
      $response = [
        'user' =>  $user,
        'token' => JWTAuth::fromUser($user),
      ];
    } else {
      $status = 422;
      $response = ['error' => 'The email or password is incorrect.'];
    }

    return response()->json($response, $status);
  }

  public function GetUser()
  {
    $user = Auth::user();
    return response()->json($user, 200);
  }

  public function show($query)
  {
    $post = User::where('id', $query)->first();
    return response()->json($post);
  }
  public function AllUser()
  {
    $all_user = User::where('role', 'user')->get();
    return response()->json($all_user);
  }

  public function name(Request $request)
  {
    $request->validate([
      'id' => 'required',
      'name' => 'required'
    ]);

    $user_id = $request->input('id');
    $name = $request->input('name');
    $requestSQL = User::where('id', $user_id)->firstorfail();
    $data = [
      'name'      => $name
    ];

    $requestSQL->update($data);
    return response()->json(['message' => 'Edit Name Successful.']);
  }

  public function username(Request $request)
  {
    $request->validate([
      'id' => 'required',
      'name' => 'required'
    ]);

    $user_id = $request->input('id');
    $userName = $request->input('name');
    $requestSQL = User::where('id', $user_id)->firstorfail();
    $data = [
      'username' => $userName
    ];

    $requestSQL->update($data);
    return response()->json(['message' => 'Edit Username Successful.']);
  }

  public function photo(Request $request)
  {
    $request->validate([
      'id' => 'required',
      'file' => 'required|mimes:jpg,jpeg,png'
    ]);
    $file_name = time() . '_' . $request->file->getClientOriginalName();
    $file_path = $request->file('file')->move(public_path('assets/img/profile'), $file_name);
    $post_image = '/assets/img/profile/' . $file_name;
    $user_id = $request->input('id');
    $result = DB::table('users')
      ->where('id', $user_id)
      ->update([
        'image' => $post_image
      ]);
    return response()->json($result);
  }
}
