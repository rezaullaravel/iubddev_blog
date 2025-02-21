<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

                //return Auth::user(); die;
                  $user = Auth::user();

                if($user->confirm_status == 0){
                    Auth::logout();
                    return redirect()->back()->with('message', 'Your account is deactive. Please contact admin.');
                } else {

                    //remember me
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

     //registration form
     public function registrationForm(){
        return view('auth.registration');
     }

     //post register
     public function postRegister(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|string|same:confirm-password',
            'confirm-password'=>'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // $data = [];
        // $data['name'] = $request->name;
        // $data['email'] = $request->email;
        // $data['code'] = base64_encode($request->email);

        $messageData = [
            'name'=> $request->name,
            'email'=>  $request->email,
            'code'=> base64_encode($request->email),
        ];

        //mail sending
        Mail::send('emails.user_verify',$messageData,function($message) use ($messageData ){
            $message->to($messageData['email'])->subject('confirm account eamil');
        });

        return redirect()->back()->with('message','Thanks for registering. We have sent a verification link to your email. Please check and verify your account.');

     }//end method

     //verify account
     public function verifyAccount($code){
        $email = base64_decode($code);
        $user = User::where('email',$email)->first();
        if($user){
           $user->confirm_status= 1;
           $user->save();
           return redirect()->route('registration')->with('message','Your account has been successfully verified. Now you can login.');
        } else {
           abort(404);
        }
     }
}
