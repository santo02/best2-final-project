<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Email;
use Tymon\JWTAuth\Facades\JWTAuth;

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
    // $credentialsUsername = $request->validate([
    //   'username' => ['required'],
    //   'password' => ['required']

    // ]);

    if (Auth::attempt($credentialsEmail) ) {
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

  public function GetUser(){
    $user = Auth::user();
    return response()->json($user, 200);
  }

}
