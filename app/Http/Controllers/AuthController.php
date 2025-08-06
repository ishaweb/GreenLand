<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //Auth function
    public function showRegister(){
        return view('auth.register');
    }
     public function showLogin(){
        return view('auth.login');
    }
     public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
        "name" => "required|string|max:255",
        "email" => "required|email|unique:users",
        "password" => "required|string|min:8|confirmed",
    ]);
        if ($validator->fails()) 
        {
           return redirect()->back()->withErrors($validator)->withInput()->with("auth_form",'register');
        }
         $user = User::create([
        "name" => $req->name,
        "email" => $req->email,
        "password" => bcrypt($req->password),
    ]);
         Auth::login($user);
         return redirect()->route('home');
        
    }
public function login(Request $req)
{
    $validator = Validator::make($req->all(), [
        "email" => "required|email",
        "password" => "required|string",
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('auth_form', 'login');
    }

    if (Auth::attempt($req->only('email', 'password'))) 
    {
        return redirect()->route('home');
    }

    return redirect()->back()
        ->withErrors(['email' => 'Invalid credentials'])
        ->withInput()
        ->with('auth_form', 'login');
}
//  logout
     public function logout(Request $req){
        
        Auth::logout();
        // remove all user session cookies
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        
        return redirect()->route('home');
            
     }
}
