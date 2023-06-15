<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {  
        return view('login.index',[
       'users' => User::all()
   ]);
   }

   public function authenticate(Request $request){
       $validated =  $request->validate([
             'username' => 'required',
             'password' => 'required'
         ]);
         if(Auth::attempt($validated)){
             $request->session()->regenerate();
             return redirect()->intended('/dash');
         }
         return back()->with('loginFailed', 'Login Failed!');
     }
     
     public function logout(Request $request){
         Auth::logout();
     
         $request->session()->invalidate();
     
         $request->session()->regenerateToken();
     
         return redirect('/');
     }
     
}
