<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\AssigenClassTeacherModel;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AssignClassToTeacherController extends Controller
{
    //show all class which assigned to a teacher
    public function list()
    {
        $data['getRecord']=AssigenClassTeacherModel::getRecord();
        return view('admin.teacher.class_assigen.list',$data);
    }

    //Assigen New class to teacher view
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getClassTeacher();
        $data['header_title'] = 'Assigen New Class To Teacher';
        return view('admin.teacher.class_assigen.add', $data);
    }

    //insert new class assinged to a teacher
    public function insert(Request $request)
    {

//dd($request->all());
        if (!empty($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher_id) {
                $getAllreadyFirst = AssigenClassTeacherModel::getAllreadyFirst($request->class_id, $request->$teacher_id);
                if (!empty($getAllreadtFirst)) {
                    $getAllreadyFirst->status = $request->status;
                    $getAllreadyFirst->save();
                } else {
                    $save = new AssigenClassTeacherModel();
                    $save->class_id = $request->class_id;
                    $save->teacher_id =$teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }



            }
            return redirect("admin/teacher/assigen_class_teacher/list")->with("success", "Subject Successfully Assigned To class");
        } else {
            return "errors";
        }
    }

    public function edit($id){
       $data['getSingle']=AssigenClassTeacherModel::getSingle($id);
       dd( $data['getSingle']);
    }
}//end class
