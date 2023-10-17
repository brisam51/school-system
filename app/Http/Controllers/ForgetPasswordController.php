<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Hash;

class ForgetPasswordController extends Controller
{
    //for invoke forget password view
    public function forgetPassword()
    {
        return view('auth.forget-password');
    }


    //for post user email for reste password
    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()


        ]);
        Mail::send('emails.forget-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Rest Password');
        });
        //dd($request->all());
        return redirect('forget-password')->with('success', 'We have send an email to reset password ');
    }


    public function resetPassword($token)
    {
        return view('auth.new-password', compact('token'));
    }

    public function restePasswordPost(Request $request)

    {
       
        $request->validate(
            [
                'email' => 'required|email|exists:users',
                'password' => 'required|confirmed',
                
                'password_confirmation' => 'required'
            ]
        );
        $upadtepassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])->first();
        if (!$upadtepassword) {
            return redirect()->to(route('reset.password'))->with('error', 'Invalid');
        }
        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);
        DB::table('password_reset_tokens')->where(['email'=>$request->email])->delete();

        return redirect('/')->with('success','passwored reset success');
    }

} //end class
