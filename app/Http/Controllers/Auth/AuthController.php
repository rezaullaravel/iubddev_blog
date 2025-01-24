<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
class AuthController extends Controller
{
    //login form
    public function loginForm(){
        if(Auth::check()){
            if(Auth::user()->role=='admin'){
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }
        return view('auth.login');
    }//end method

    //post login
    public function postLogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);


        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            //remember user email and password
            if(!empty($request->remember)){
                setcookie('email',$request->email,time()+3600);
                setcookie('password',$request->password,time()+3600);
               } else {
                setcookie('email','');
                setcookie('password','');
               }
            if(Auth::user()->role=='admin'){
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        } else {
            return redirect()->back()->with('error_message','Oops! Wrong credentials.');
        }
    }//end method

    //admin dashboard
    public function adminDashboard(){
        return view('admin.admin_dashboard');
    }//end method

     //admin dashboard
     public function userDashboard(){
        return view('user.user_dashboard');
     }//end method

     //logout
     public function logout(){
        Auth::logout();
        return redirect()->route('home');
     }//end method
}
