<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use App\Models\ClassSubjectModel;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class SubjectController extends Controller
{
    public function List()
    {
        $data["subject"] = SubjectModel::getAllRecord();
        return view("admin.subject.list", $data);

    }

    //Add new Subject
    public function Add()
    {
        return view("admin.subject.add");
    }
    public function Insert(Request $request)
    {
        if (!empty($request)) {
            $ruls = [
                'name' => 'required|min:3|unique:subject',
                'type' => 'required',
                'status' => 'required',
            ];
            $message = [
                'name.required' => 'please insert subject name',
                'name.min' => 'please insert atleast three charecter for subject name',
                'name.unique' => 'This subject name is exist',
                'type.required' => 'plesa select subject type',
                'status.required' => 'please select subject status',
            ];
            $request->validate($ruls, $message);
            $subject = new SubjectModel();
            $subject->name = $request->name;
            $subject->type = $request->type;
            $subject->status = $request->status;
            $subject->created_by = Auth::user()->id;
            $subject->save();
            return redirect('admin/subject/list')->with('success', 'subject by name:' . $subject->name . 'added successfully');

        } else {
            return redirect('adsubject/newsubject')->with('errors');

        }


    }


    //create function for invok update subject view
    public function UpdateSubjectView(Request $request)
    {
        $data['data'] = SubjectModel::find($request->id);
        return view('admin.subject.edit', $data);
    }

    //create function for edit subject information
    public function UpdateSubjectPost(Request $request, $id)
    {
        if (!empty($request)) {
            $data = SubjectModel::where('id', $id)->first();
            // $subject=new SubjectModel();

            $ruls = [
                'name' => 'required|min:3|unique:subject,name,' . $data->id,
                'type' => 'required',
                'status' => 'required',
            ];
            $message = [
                'name.required' => 'please insert subject name',
                'name.min' => 'please insert atleast three charecter for subject name',
                'name.unique' => 'This subject name is exist',
                'type.required' => 'plesa select subject type',
                'status.required' => 'please select subject status',
            ];
            $request->validate($ruls, $message);
            $data->name = $request->name;
            $data->type = $request->type;
            $data->status = $request->status;
            $data->save();
            return redirect('admin/subject/list')->with('success', 'Information a boute' . $data->name . 'Updeted Successfully');
        } else {
            return redirect()->route('UpdatSubjecteView')->with('errors');
        }

        //creat function for delete subject

    }

    public function DeleteSubject($id)
    {
        $data = SubjectModel::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'subject with name:  ' . $data->name . ' deleted successfully');
    }
    public function SubjectSearch(Request $request)
    {
        // select('class.*', 'users.name as created_by_name')
        // ->join('users', 'class.created_by', '=', 'users.id')
        // ->where('class.name', 'LIKE', '%' . $request->name . '%')
        // ->orderBy('class.id','desc')
        // ->paginate(10, ['*'], 'page', $request->page);

        if (!empty($request)) {
            $data = SubjectModel::select('subject.*', 'users.name as created_by_name')
                ->join('users', 'subject.created_by', '=', 'users.id')
                ->where('subject.name', 'like', '%' . $request->name . '%')->paginate(2);
            return view('admin.subject.list', ['subject' => $data]);
        }
    }

    //show subject in student side
    public function Mysubject()
    {
//dd(Auth::user()->class_id);
        $data['subject'] = ClassSubjectModel::mySubject(Auth::user()->class_id);
        $data['header_title'] = 'My Subjects List';
        return view('student.my_subject',$data);
    }
//for show all subject of student in parent side.
public function parent_student_subject($student_id){

    $user=User::getSingle($student_id);
    $data['getUser']=$user;
    $data['subject'] = ClassSubjectModel::mySubject( $user->class_id);
    $data['header_title'] = 'My Student Subjects List';
    return view('parent.my_student_subject',$data);
}








} //end class
