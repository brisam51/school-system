<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    //Show all teachers
    public function List()
    {
        $data['getTeacher'] = User::getTeacher();
        $data['header_title'] = 'Teacher List';
        return view('admin.teacher.list', $data);
    }




    //call View Add new Teacher
    public function Add()
    {
        $data['header_title'] = 'Teacher Section';
        $data['Add_New'] = 'Add New Teacher';
        return view('admin.teacher.add_view', $data);
    }

    //Insert new teacher data in to users table in  database
    public function Insert(Request $request)
    {
        //dd($request->all());
        $teacher = new User();
        $ruls = [
            "name" => "required",
            "last_name" => "required",
            "email" => "required|unique:users",
            "gender" => "required",
            "status" => "required",
            "mobile_number" => "required",
            "password" => "required",
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
            $teacher->user_type = 3;
            $teacher->password = Hash::make($request->password);
            $teacher->mobile_number = $request->mobile_number;
            $teacher->created_at = Carbon::now();

            if ($request->hasFile('profile_pic')) {

                $newImagename = time() . '-' . $request->name . '.' . $request->profile_pic->extension();
                $request->profile_pic->move(public_path('images/teachers/'), $newImagename);
                $teacher->profile_pic = $newImagename;
            }

            $teacher->save();
            return redirect()->route('admin.teacher.list')->with('success', 'data about new teacher recorded successfully');
        } else {
            return back()->withErrors('errors')->withInput();

        }
    }

    //call update view
    public function edit_view($id)
    {
        $data['teacher'] = User::find($id);
        $data["header_title"] = "Updata Teacher Data";
        return view('admin.teacher.edit_view', $data);
    }

    //update teacher data
    public function Update(Request $request, $id)
    {
        $teacher = User::find($id);
        $ruls = [
            "name" => "required",
            "last_name" => "required",
            "email" => "required|unique:users,email,$teacher->id",
            "gender" => "required",
            "status" => "required",
            "mobile_number" => "required",
            // "password" => "required",


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
            if (!empty($request->password)) {
                $teacher->password = Hash::make($request->email);
            }

            $teacher->updated_at = Carbon::now();
            if ($request->hasFile('profile_pic')) {
                $destantion = public_path('images/teachers/' . $teacher->profile_pic);

                if (file_exists($destantion)) {
                    unlink($destantion);
                }
                $newImagename = time() . '-' . $request->name . '.' . $request->profile_pic->extension();
                $request->profile_pic->move(public_path('images/teachers/'), $newImagename);
                $teacher->profile_pic = $newImagename;
            }
            $teacher->save();
            return redirect()->route('admin.teacher.list')->with('success', 'data about ( ' . $teacher->name . ') updated successfully');

        } else {
            return back()->withErrors('errors')->withInput();
        }

    }


    //delete teacher information
    public function Delete($id)
    {
        $teacher = User::find($id);
        $destantion = public_path('images/teachers/' . $teacher->profile_pic);

                if (file_exists($destantion)) {
                    unlink($destantion);
                }
        $teacher->delete();

        return back()->with('success', 'All information about( ' . $teacher->name . ' )deleted successfullt');
    }


    public function Search(Request $request)
    {
        $data["header_title"] = "Search List";
        $data["getTeacher"] = User::select("users.*")
            ->where("user_type", "=", 3);
        if (!empty($request->name)) {
            $data["getTeacher"] = $data["getTeacher"]->where("users.name", "like", "%" . $request->name . "%")->paginate(10);
        } elseif (!empty($request->last_name)) {
            $data["getTeacher"] = $data["getTeacher"]->where("users.last_name", "like", "%" . $request->last_name . "%")->paginate(10);
        }

        return view('admin.Teacher.list', $data);
    }

//my subject class







} //end class
