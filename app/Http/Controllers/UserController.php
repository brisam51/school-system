<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

class UserController extends Controller
{
    //call view for change password



    //invoke student change password view
    public function studentPasswordView()
    {

        $data['header_title'] = 'Change Password student';
        return view('profile.studentChangePassword', $data);
    }

    public function studentPasswordUpdate(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'password updated successfully');
        } else {
            return redirect()->back()->withErrors('old Password not match password in database');
        }

    }

    //call change password  admin view
    public function adminChangePasswordView()
    {
        $data['header_title'] = 'Admin Change Password ';
        return view('profile.adminChangePassword', $data);
    }

    //update  admin password information
    public function adminUpdatePassword(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'password updated successfully');
        } else {
            return redirect()->back()->withErrors('old Password not match password in database');
        }
    }
//call teacher change password view
public function teacherChangePasswordView()
{
    $data['header_title'] = 'Admin Change Password ';
    return view('profile.teacherChangePassword', $data);
}

//update  admin password information
public function teacherUpdatePassword(Request $request)
{
    $user = User::getSingle(Auth::user()->id);
    if (Hash::check($request->old_password, $user->password)) {
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', 'password updated successfully');
    } else {
        return redirect()->back()->withErrors('old Password not match password in database');
    }
    }


//call change password view
public function parentChangePasswordView()
{
    $data['header_title'] = 'Admin Change Password ';
    return view('profile.parentChangePassword', $data);
}

//update  admin password information
public function parentUpdatePassword(Request $request)
{
    $user = User::getSingle(Auth::user()->id);
    if (Hash::check($request->old_password, $user->password)) {
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', 'password updated successfully');
    } else {
        return redirect()->back()->withErrors('old Password not match password in database');
    }
    }




} //end class
