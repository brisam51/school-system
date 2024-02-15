<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;
use File;
use Illuminate\Support\Carbon;

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
    //create method foe call admin update account view
    public function admin_Account_view()
    {
        $data['updateAdmin'] = User::getSingle(Auth::user()->id);
        return view('admin.admin.myaccount', $data);
    }


    //create for update adminaccoun information
    public function admin_Account_Update(Request $request)
    {

        $user = User::getSingle(Auth::user()->id);
                $ruls = [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'unique:users,email,' . $user->id,

        ];
        $message = [
            'name.required' => 'you must insert admin Name',
            'name.string' => 'you must insert admin Name as string type',
            'name.min' => 'you must insert atleas three chracter for admin Name',
            'last_name.required'=>'please insert last name'

        ];
        $request->validate($ruls, $message);
        if (!empty($request)) {
            $user->name = trim($request->name);
            $user->last_name = trim($request->last_name);
            $user->email = $request->email;

            if (!empty($user->user_type)) {
                $user->user_type = $request->user_type;
            }
            if (!empty($user->password)) {
                $user->password = Hash::make($request->password);
            }
            $user->updated_at = Carbon::now();
            $user->save();
            //list
            return redirect('admin/list')->with('success', ' Information abute  updated successfully');
        } else {
            return back()->withErrors('errors');
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
    public function myAccount()
    {
        // $result = User::getSingle(Auth::user()->id);
        $data['value'] = User::getSingle(Auth::user()->id);

        if (Auth::user()->id == 3) {
            return view('teacher.myaccount', $data);
        } elseif (Auth::user()->id == 4) {
            return view('parent.myaccount', $data);
        }




    }






    public function Teacher_Account_Update(Request $request)
    {

        $teacher = User::getSingle(Auth::user()->id);
        $ruls = [
            "name" => "required",
            "last_name" => "required",
            "email" => "required|unique:users,email,$teacher->id",
            "gender" => "required",
            "status" => "required",
            "mobile_number" => "required",

        ];

        $message = [
            "name" => "please insret first name",
            "last_name" => "please insert last name",
            "gender" => "please select gender",
            "status" => "please select status",
            "email" => "please insert email",
            "password" => "please insert corect password",
            "mobile_number" => "please insert mobile number",

        ];

        $request->validate($ruls, $message);
        if (!empty($request)) {
            $teacher->name = $request->name;
            $teacher->last_name = $request->last_name;
            $teacher->gender = $request->gender;
            $teacher->status = $request->status;
            $teacher->email = $request->email;
            $teacher->mobile_number = $request->mobile_number;
            $teacher->updated_at = Carbon::now();
            if ($request->hasFile('profile_pic')) {
                $newImagename = time() . '-' . $request->name . '.' . $request->profile_pic->extension();
                $request->profile_pic->move(public_path('asstes/img/profile'), $newImagename);
                $teacher->profile_pic = $newImagename;
            }
            $teacher->save();
            return redirect()->back()->with('success', 'data about ( ' . $teacher->name . ') updated successfully');

        } else {
            return redirect()->back()->withErrors('errors')->withInput();
        }
    }

    //start ---------student change Account---------------
    public function my_account_student_view(Request $request)
    {
        $id = Auth::user()->id;
        $data['getstudent'] = User::getSingle($id);

        return view('student.myaccount', $data);
    }

    //
    public function Student_Account_Update(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        $ruls = [

            'name' => 'required',
            'last_name' => 'required',
            'email' => 'unique:users,email,' . $user->id,
            'gender' => 'required',
            'date_of_brith' => 'required',
            'address' => 'required',
            'mobile_number' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required',
            'status' => 'required',
            'blood_group' => 'required',

        ];

        $message = [
            'name.required' => 'Insert first name',
            'last_name.required' => 'Insert Last Name',
            'gender.required' => 'Insert  Gender',
            'address.required' => 'Insert Address',
            'mobile_number.required' => 'Insert Mobile Number',
            'height.required' => 'Insert Height',
            'height.numeric' => 'Insert degital number',
            'weight.required' => 'Insert Weight',
            'weight.numeric' => 'Insert degital number',
            'status.required' => 'Insert Status',
            'email.required' => 'Insert Email',
            'email.unique' => 'This email is exist in user data base please select new emaile',
            'email.email' => 'Insert Email format(example@email.com)',
            'blood_group.required' => 'Insert Blood Group',



        ];
        $request->validate($ruls, $message);


        if (!empty($request)) {
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->mobile_number = $request->mobile_number;
            $user->height = $request->height;
            $user->weight = $request->weight;
            $user->status = $request->status;
            $user->date_of_brith = $request->date_of_brith;
            $user->blood_group = $request->blood_group;
            $user->address = $request->address;
            if ($request->hasFile('profile_pic')) {
                $newImagename = time() . '-' . $request->name . '.' . $request->profile_pic->extension();
                $request->profile_pic->move(public_path('asstes/img/profile'), $newImagename);
                $user->profile_pic = $newImagename;
            }

            $user->save();

            return redirect('student/account')->with('success', 'student information updated succcessfully');
        } else {
            return back()->withErrors('errors');
        }
    }

    //end ---------student change Account---------------
//create function foe call edit parent account
    public function parent_account_view()
    {
        $data['header_title'] = 'Update My Account';
        $data['getParent'] = User::getSingle(Auth::user()->id);
        return view('parent.myaccount', $data);
    }

    //create function for update parent Account info
    public function parent_account_update(Request $request)
    {
        $parent = User::getSingle(Auth::user()->id);

        $ruls = [
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'occupation' => 'required',
            'address' => 'required'
        ];
        $messages = [
            'name.required' => 'please insert parent name',
            'last_name.required' => 'please insert parent  last name',
            'gender.required' => 'please select parent gender',
            'status.required' => 'please select parent status',
            'email' => 'unique:users,email,' . $parent->id,
            'occupation.required' => 'please insert parent ccupation',
            'addless.required' => 'please insert parent address',
        ];


        if (!empty($request)) {
            $parent->name = $request->name;
            $parent->name = $request->name;
            $parent->last_name = $request->last_name;
            $parent->gender = $request->gender;
            $parent->status = $request->status;
            $parent->email = $request->email;
            $parent->occupation = $request->occupation;
            $parent->mobile_number = $request->mobile_number;
            $parent->address = $request->address;

            if ($request->hasFile('profile_pic')) {
                $newImage = time() . '-' . $parent->name . '.' . $request->profile_pic->extension();
                $request->profile_pic->move(public_path('asstes/img/profile/parents'), $newImage);
                $request->validate($ruls, $messages);
                // $parent

                $image_path = 'asstes/img/profile/parents/' . $parent->profile_pic;

                if (File::exists($image_path)) {
                    File::deleteDirectory($image_path);
                }
                $parent->profile_pic = $newImage;
            }


            $parent->save();
            return redirect()->back()->with('success', 'parent  accuont information updeted succefully');
        } else {
            return back()->withErrors('errors')->withInput();
        }

    }
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


    //Route::get('student/account', [UserController::class,'myAccount_student']);

} //end class
