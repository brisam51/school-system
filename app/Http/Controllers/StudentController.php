<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Hash;
use Auth;
use Str;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    //display student list
    public function List()
    {
        //$data['getStudent'] = DB::table('users')->where('user_type', '=', 2)->get();
        $data['getStudent'] = User::getStudent();
        $data['header_title'] = 'Student List';
        return view('admin.student.list', $data);
    }
    //call insert new student view page
    public function Add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = ' Add New Student List';
        return view('admin.student.add', $data);

    }


    //Insert student information into database
    public function Insert(Request $request)
    {



        $student = new User();
        $ruls = [
            'name' => 'required',
            'last_name' => 'required',
            'admission_number' => 'required',
            'roll_number' => 'required',
            'class_id' => 'required',
            'gender' => 'required',
            'date_of_brith' => 'required',
            'caste' => 'required',
            'religion' => 'required',
            'mobile_number' => 'required|numeric',
            'admission_date' => 'required',
            'height' => 'required|numeric',
            'weight' => 'required',
            'status' => 'required',
            'email' => 'required|email|unique:users',
            'Password' => 'required',
            'blood_group' => 'required',
            'profile_pic' => 'required|mimes:jpg,png,jpeg|max:5048',
        ];

        $message = [
            'name.required' => 'Insert first name',
            'last_name.required' => 'Insert Last Name',
            'admission_number.required' => 'Insert Admission Number',
            'roll_number.required' => 'Insert Roll Number',
            'class_id.required' => 'Insert clas ID',
            'gender.required' => 'Insert  Gender',
            'date_of_brith.required' => 'Insert  Of Date Brith ',
            'caste.required' => 'Insert Caste',
            'religion.required' => 'Insert Religion',
            'mobile_number.required' => 'Insert Mobile Number',
            'admission_date.required' => 'Insert Admission Date',
            'height.required' => 'Insert Height',
            'height.numeric' => 'Insert degital number',
            'weight.required' => 'Insert Weight',
            'weight.numeric' => 'Insert degital number',
            'status.required' => 'Insert Status',
            'email.required' => 'Insert Email',
            'email.unique' => 'This email is exist in user data base please select new emaile',
            'email.email' => 'Insert Email format(example@email.com)',
            'Password.required' => 'Insert Password',

            'blood_group.required' => 'Insert Blood Group',
            'profile_pic.required' => 'Insert Profile picture',

        ];
        $request->validate($ruls, $message);

        if (!empty($request)) {
            $student->name = $request->name;
            $student->last_name = $request->last_name;
            $student->admission_number = $request->admission_number;
            $student->roll_number = $request->roll_number;
            $student->class_id = $request->class_id;
            $student->gender = $request->gender;
            $student->date_of_brith = $request->date_of_brith;
            $student->caste = $request->caste;
            $student->religion = $request->religion;
            $student->mobile_number = $request->mobile_number;
            $student->admission_date = $request->admission_date;
            $student->height = $request->height;
            $student->weight = $request->weight;
            $student->status = $request->status;
            $student->email = $request->email;
            $student->Password = Hash::make($request->Password);
            $student->blood_group = $request->blood_group;
            if ($request->hasFile('profile_pic')) {

                $newImagename = time() . '-' . $request->name . '.' . $request->profile_pic->extension();
                $request->profile_pic->move(public_path('images/students/'), $newImagename);
                $student->profile_pic = $newImagename;
            }

            $student->user_type = 2;
            $student->save();

            return redirect('admin/student/list')->with('success', 'student information Inserted succcessfully');
        } else {
            return back()->withErrors('errors')->withInput();
        }


    }
    //create function fr call edit view
    public function Edit($id)
    {
        $data['getstudent'] = User::find($id);
        $data['getclass'] = ClassModel::getClass();
        // $data['header_title'] = ' update Student information';

        return view("admin.student.edit", $data);
    }
    //function for insert new data which must be updated
    public function Update($id, Request $request)
    {

        $user = User::where('id', $id)->first();
        $ruls = [

            'name' => 'required',
            'last_name' => 'required',
            'email' => 'unique:users,email,' . $user->id,
            'admission_number' => 'required',
            'roll_number' => 'required',
            'class_id' => 'required',
            'gender' => 'required',
            'date_of_brith' => 'required',
            'caste' => 'required',
            'religion' => 'required',
            'mobile_number' => 'required|numeric',
            'admission_date' => 'required',
            'height' => 'required|numeric',
            'weight' => 'required',
            'status' => 'required',
            'blood_group' => 'required',
            'profile_pic' => 'required|mimes:jpg,png,jpeg|max:5048',
        ];

        $message = [
            'name.required' => 'Insert first name',
            'last_name.required' => 'Insert Last Name',
            'admission_number.required' => 'Insert Admission Number',
            'roll_number.required' => 'Insert Roll Number',
            'class_id.required' => 'Insert clas ID',
            'gender.required' => 'Insert  Gender',
            'date_of_brith.required' => 'Insert  Of Date Brith ',
            'caste.required' => 'Insert Caste',
            'religion.required' => 'Insert Religion',
            'mobile_number.required' => 'Insert Mobile Number',
            'admission_date.required' => 'Insert Admission Date',
            'height.required' => 'Insert Height',
            'height.numeric' => 'Insert degital number',
            'weight.required' => 'Insert Weight',
            'weight.numeric' => 'Insert degital number',
            'status.required' => 'Insert Status',
            'email.required' => 'Insert Email',
            'email.unique' => 'This email is exist in user data base please select new emaile',
            'email.email' => 'Insert Email format(example@email.com)',
            'blood_group.required' => 'Insert Blood Group',
            'profile_pic.required' => 'Insert Profile picture',
            'profile_pic.mimes' => 'type image is not propr',
            'profile_pic.max' => 'max size must b :5048',


        ];
        $request->validate($ruls, $message);


        if (!empty($request)) {
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->admission_number = $request->admission_number;
            $user->roll_number = $request->roll_number;
            $user->class_id = $request->class_id;
            $user->gender = $request->gender;
            $user->date_of_brith = $request->date_of_brith;
            $user->caste = $request->caste;
            $user->religion = $request->religion;
            $user->mobile_number = $request->mobile_number;
            $user->admission_date = $request->admission_date;
            $user->height = $request->height;
            $user->weight = $request->weight;
            $user->status = $request->status;
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);

            }

            $user->blood_group = $request->blood_group;
            $user->user_type = 2;
            if ($request->hasFile('profile_pic')) {

                $destantion=public_path('images/students/'.$user->profile_pic);

                if(file_exists($destantion)){
                   unlink( $destantion);
                }

                $newImagename = time() . '-' . $request->name . '.' . $request->profile_pic->extension();
                $request->profile_pic->move(public_path('images/students/'), $newImagename);

                $user->profile_pic = $newImagename;
            }


            $user->save();

            return redirect('admin/student/list')->with('success', 'student information updated succcessfully');
        } else {
            return back()->withErrors('errors');
        }
    }

    public function Delete($id)
    {
        $delete_student = User::getSingle($id);

        $destantion=public_path('images/students/'. $delete_student->profile_pic);

        if(file_exists($destantion)){
           unlink( $destantion);
        }
        $delete_student->delete();
        return redirect()->back()->with(['success' => 'deleted successfully']);

    }

    public function search_student(Request $request)
    {

        if (!empty($request)) {
            $getStudent = User::select('users.*', 'class.name as class_name')
                ->join('class', 'users.class_id', '=', 'class.id', 'left')
                ->where('users.user_type', '=', 2);

            if (!empty($request->name)) {
                $getStudent = $getStudent->where('users.name', 'like', '%' . $request->name . '%')->get();
                //dd($return);
            } elseif (!empty($request->last_name)) {
                $getStudent = $getStudent->where('users.last_name', 'like', '%' . $request->last_name . '%')->get();

            }
            $header_titel = "search student";
            return view('admin.student.list', ['getStudent' => $getStudent, 'header_title' => $header_titel]);
        }
    }
} //end class

