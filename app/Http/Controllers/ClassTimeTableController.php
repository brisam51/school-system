<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectTimetableModel;
use App\Models\WeekModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ClassTimeTableController extends Controller
{
    public function list(Request $request)
    {
        $data['header_title'] = 'Calss Time Table List';
        $data['getClass'] = ClassModel::getClass();
        $getWeek = WeekModel::getRecorde();
        $week = array();
        foreach ($getWeek as $value) {
            $dataW = array();
            $dataW['week_id'] = $value->id;
            $dataW['week_name'] = $value->name;

            if (!empty($request->class_id) && !empty($request->subject_id)) {
                $ClassSubject = ClassSubjectTimetableModel::getClassSbject($request->class_id, $request->subject_id, $value->id);

                if (!empty($ClassSubject)) {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['room_number'] = $ClassSubject->room_number;
                } else {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }
            } else {
                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['room_number'] = '';

            }
            $week[] = $dataW;
        }
        $data['week'] = $week;
        if (!empty($request->class_id)) {
            $data['getSubject'] = ClassSubjectModel::mySubject($request->class_id);
        }


        return view('admin.class_time_table.list', $data);
    }

    function get_subject(Request $request)
    {

        $getSubject = ClassSubjectModel::mySubject($request->class_id);
        $html = "<option value=''>Select</option>";
        foreach ($getSubject as $value) {
            $html .= "<option value='" . $value->subject_id . "'>" . $value->subject_name . "</option>";
        }
        $json['html'] = $html;
        echo json_encode($json);
    }

    public function insert_update(Request $request)
    {
        ClassSubjectTimetableModel::where('class_id', '=', $request->class_id)->where('subject_id', '=', $request->subject_id)->delete();
        foreach ($request->timetable as $timetable) {
            if (!empty($timetable['week_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time']) && !empty($timetable['room_number'])) {
                $save = new ClassSubjectTimetableModel();
                $save->class_id = $request->class_id;
                $save->subject_id = $request->subject_id;
                $save->week_id = $timetable['week_id'];
                $save->start_time = $timetable['start_time'];
                $save->end_time = $timetable['end_time'];
                $save->room_number = $timetable['room_number'];
                $save->save();
            }
        }
        return back()->with('success', 'Add data to ClassSubjectTimetabl successfully');
    }
    public function studentMyTimetable()
    {

        $result = array();
        $getMyClass = ClassSubjectModel::mySubject(Auth::user()->class_id);

        foreach ($getMyClass as $value) {
            $dataS['subject_name'] = $value->subject_name;
            $getweekday = WeekModel::getRecorde();
            $week = array();
            foreach ($getweekday as $valueW) {
                $dataW = array();
                $dataW['week_name'] = $valueW->name;
                $ClassSubject = ClassSubjectTimetableModel::getall($value->class_id, $value->subject_id, $valueW->id);
                if (!empty($ClassSubject)) {
                    $dataW['start_time'] = $ClassSubject->start_time;
                    $dataW['end_time'] = $ClassSubject->end_time;
                    $dataW['room_number'] = $ClassSubject->room_number;
                } else {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';
                }
                $week[] = $dataW;

            }
            $dataS['week'] = $week;
            $result[] = $dataS;

        }

        $data['result'] = $result;
        //dd($data);
        return view('admin.class_time_table.student_timetable', $data);
    }


    //teacher side
    public function MyTimetableTeacher($class_id, $subject_id, )
    {

        $data['getClassName'] = ClassModel::getSingleRecord($class_id);
        $data['getSubjectName'] = SubjectModel::getSingleRecord($subject_id);
        $getweekday = WeekModel::getRecorde();
        foreach ($getweekday as $valueW) {
            $dataW = array();
            $dataW['week_name'] = $valueW->name;
            $ClassSubject = ClassSubjectTimetableModel::getall($class_id, $subject_id, $valueW->id);
            if (!empty($ClassSubject)) {
                $dataW['start_time'] = $ClassSubject->start_time;
                $dataW['end_time'] = $ClassSubject->end_time;
                $dataW['room_number'] = $ClassSubject->room_number;
            } else {
                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['room_number'] = '';
            }

            $result[] = $dataW;
        }
        $data['getRecord'] = $result;
        return view('admin.class_time_table.teacher_timetable', $data);
    }

    //..........parent side................
public function parentStudentTimetable($class_id,$subject_id,$student_id){

        $data['getClassName'] = ClassModel::getSingleRecord($class_id);
        $data['getSubjectName'] = SubjectModel::getSingleRecord($subject_id);
        $data['student_info'] = User::getSingle($student_id);
        $getweekday = WeekModel::getRecorde();
        foreach ($getweekday as $valueW) {
            $dataW = array();
            $dataW['week_name'] = $valueW->name;
            $ClassSubject = ClassSubjectTimetableModel::getall($class_id, $subject_id, $valueW->id);
            if (!empty($ClassSubject)) {
                $dataW['start_time'] = $ClassSubject->start_time;
                $dataW['end_time'] = $ClassSubject->end_time;
                $dataW['room_number'] = $ClassSubject->room_number;
            } else {
                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['room_number'] = '';
            }

            $result[] = $dataW;

        }
      $data['getRecord'] = $result;
        return view('admin.class_time_table.parent_timetable' ,$data);
}

}//End Class..
