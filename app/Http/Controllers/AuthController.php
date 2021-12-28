<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showFormLogin()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->only('email','password');
        if (Auth::attempt($data)){
            return redirect()->route('posts.index');
        }else{
            return redirect()->route('admin.showFormLogin');
        }
    }

    public function logout()
    {
        flush();
        Auth::logout();
        return redirect()->route('admin.showFormLogin');
    }

    public function showFormRegister()
    {
        return view('backend.auth.register');
    }

   public function register(Request $request)
   {
       $request->validate([
           'name'=> 'required',
           'email'=> 'required',
           'password'=> 'required',
       ]);
       $data = $request->only('name','email','password');
       $data["password"] = Hash::make($request->password);
       $user= User::query()->create($data);
       $user->save();
       return redirect()->route("admin.showFormLogin");
   }
}
