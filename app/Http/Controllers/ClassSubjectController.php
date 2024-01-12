<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;


class ClassSubjectController extends Controller
{
    public function List(Request $request)
    {
        $data["getRecord"] = ClassSubjectModel::getRecord();
        return view("admin.assign-subject.list", $data);


    }


    public function Add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        return view("admin.assign-subject.add", $data);
    }

    public function Insert(Request $request)
    {
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAllreadyFirst = ClassSubjectModel::getAllreadyFirst($request->class_id, $request->$subject_id);
                if (!empty($getAllreadtFirst)) {
                    $getAllreadyFirst->status = $request->status;
                    $getAllreadyFirst->save();
                } else {
                    $save = new ClassSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }



            }
            return redirect("admin/assign-subject/list")->with("success", "Subject Successfully Assigned To class");
        } else {
            return "errors";
        }

    }

    public function Edit($id)
    {

        $getRecord = ClassSubjectModel::getSingel($id);
        if (!empty($getRecord)) {
            $data["getRecord"] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = 'Assign Subject Class';
            return view('admin/assign-subject/edit', $data);
        }

    }

    public function Update(Request $request)
    {
        ClassSubjectModel::deleteSubject($request->class_id);
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAllreadyFirst = ClassSubjectModel::getAllreadyFirst($request->class_id, $request->$subject_id);
                if (!empty($getAllreadtFirst)) {
                    $getAllreadyFirst->status = $request->status;
                    $getAllreadyFirst->save();
                } else {
                    $save = new ClassSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }



            }

        }

        return redirect("admin/assign-subject/list")->with("success", "Subject Successfully Assigned To class");

    } //end class
    public function Delete($id)
    {
        $delete = ClassSubjectModel::getSingel($id);
        $delete->delete();

        return redirect("admin/assign-subject/list")->with("success", "assignSubject with class name.$delete->id. Successfully ");

    }
    public function Edit_single($id)
    {
        $getRecord = ClassSubjectModel::getSingel($id);
        if (!empty($getRecord)) {
            $data["getRecord"] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = 'Edit Assign Subject';
            return view('admin/assign-subject/edit_single', $data);
        }

    } //end class

    //create class for update single subject
    public function Update_single(Request $request, $id)
    {
        $getAllreadyFirt = ClassSubjectModel::getAllreadyFirst($request->class_id, $request->subject_id);
        if (!empty($getAllreadyFirt)) {
            $getAllreadyFirt->status = $request->status;
            $getAllreadyFirt->save();
            return redirect("admin/assign-subject/list")->with("success", "assignSubject with class name Successfully ");
        } else {
            $save = ClassSubjectModel::getSingel($id);
            $save->class_id=$request->class_id;
            $save->subject_id=$request->subject_id;
            $save->status=$request->status;
            $save->save();
            return redirect("admin/assign-subject/list")->with("success", "assignSubject with class name Successfully ");
        }

        dd($getAllreadyFirt);
    }






} //end class
