<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Mail\ForgetPassword;//
use Illuminate\Support\Str;
use Mail;
use App\Models\User;

class AuthController extends Controller
{

   //login method
   public function login()
   {
     // $hash=Hash::make(1234);
      if (!empty(Auth::check())) {
         if (Auth::user()->user_type == 1) {
            return redirect('admin/dashboard');
         } else if (Auth::user()->user_type == 2) {
            return redirect('student/dashboard');
         } else if (Auth::user()->user_type == 3) {
            return redirect('teacher/dashboard');
         } else if (Auth::user()->user_type == 4) {
            return redirect('parent/dashboard');
         } else {
            return redirect(url(''));
         }
      }
      return view('auth.login');
     // dd($hash);
   }


   //fot authentication
   public function authlogin(Request $request)
   {
      $remember = !empty($request->remember) ? true : false;
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
         if (Auth::user()->user_type == 1) {
            return redirect('admin/dashboard');
         } else if (Auth::user()->user_type == 2) {
            return redirect('student/dashboard');
         } else if (Auth::user()->user_type == 3) {
            return redirect('teacher/dashboard');
         } else if (Auth::user()->user_type == 4) {
            return redirect('parent/dashboard');
         } else {
            return redirect(url(''));
         }

      } else {
         return redirect()->back()->withErrors('please insert correct email or password')->withInput();
      }
      //dd($request->all());
   }

   public function Logout()
   {
      Auth::logout();
      return redirect('/');
   }

   //forget password..


  

} //end class...
