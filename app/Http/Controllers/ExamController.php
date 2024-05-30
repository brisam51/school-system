<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use App\Models\ClassSubjectModel;
use App\Models\ExamModel;
use App\Models\ExamScheduleModel;
use Illuminate\Http\Request;
use App\Models\AssigenClassTeacherModel;
use auth;

class ExamController extends Controller
{
    //show all record
    public function list()
    {
        $data['header_title'] = 'Exam List';
        $data['getRecords'] = ExamModel::index();
        return view('admin.examination.exam.list', $data);
    }
    public function add_view()
    {
        $data['header_title'] = 'Add New Exam ';
        return view('admin.examination.exam.exam_add_view', $data);
    }

    //for add new exam data...........
    public function insert(Request $request)
    {
        $exam = new ExamModel;
        $ruls = [
            'name' => 'required|string|min:3',
            'note' => 'required|string|min:3',
        ];
        $message = [
            'name.required' => 'please Insert Exam Name!',
            'name.string' => 'please Insert charcter for Exam Name!',
            'name.min' => 'please Insert  atleast charcter for Exam Name!',
            'note.required' => 'please Insert  note for Exam Name!',
            'note.string' => 'please Insert  string charecter for Exam Note!',
            'note.min' => 'please Insert  atleast charcter for Exam Note!',
        ];
        $request->validate($ruls, $message);
        if (!empty($request)) {
            $exam->name = trim($request->name);
            $exam->note = trim($request->note);
            $exam->exam_date = trim($request->exam_date);
            $exam->created_by = auth()->user()->id;
            $exam->save();
            return redirect('admin/exam/list')->with('success', 'new exam added successfully');
        } else {
            return back()->withErrors('errors');
        }

    }
    //for call update page
    public function edit($id)
    {
        $data['result'] = ExamModel::getSingleRecord($id);

        return view('admin/examination/exam/exam_edit', $data);
    }
    //For update exam data
    public function update(Request $request, $id)
    {
        $update = ExamModel::getSingleRecord($id);
        $ruls = [
            'name' => 'required|string|min:3',
        ];
        $message = [
            'name.required' => 'please insert name for exam',
            'name.string' => 'please insert strinh chatecter for exam name',
            'name.min' => 'please insert atlest three charecter for name of exam',

        ];
        $request->validate($ruls, $message);
        if (!empty($update)) {
            $update->name = $request->name;
            $update->exam_date = $request->exam_date;
            $update->note = $request->note;
            $update->update();
            return redirect('admin/exam/list')->with('success', 'Exam Data updated successfully');
        } else {
            return back()->withErrors('errors');
        }
    }
    //For delete exam data
    public function delete($id)
    {
        $delete = ExamModel::getSingleRecord($id);
        $delete->is_deleted = 1;
        $delete->save();
        return redirect('admin/exam/list')->with('success', 'Exam Data deleted successfully');
    }
    //For show exam schedule time table...
    public function examSchedule(Request $request)
    {

        $data['getClassRecord'] = ClassModel::getClass();
        $data['getExamRecord'] = ExamModel::getExamRecord();
        $result = array();
        if (!empty($request->class_id && $request->exam_id)) {
            $getSubject = ClassSubjectModel::mySubject($request->class_id);
            foreach ($getSubject as $value) {
                $dataS = array();
                $dataS['class_id'] = $value->class_id;
                $dataS['subject_id'] = $value->subject_id;
                $dataS['created_by'] = $value->created_by;
                $dataS['subject_name'] = $value->subject_name;
                $dataS['class_name'] = $value->class_name;
                $dataS['subject_type'] = $value->subject_type;
                $schedule = ExamScheduleModel::getRecordSingle($request->get('class_id'), $value->subject_id, $request->get('exam_id'));
                if (!empty($schedule)) {
                    $dataS['exam_date'] = $schedule->exam_date;
                    $dataS['start_time'] = $schedule->start_time;
                    $dataS['end_time'] = $schedule->end_time;
                    $dataS['room_number'] = $schedule->room_number;
                    $dataS['full_marks'] = $schedule->full_marks;
                    $dataS['passing_mark'] = $schedule->passing_mark;
                } else {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['room_number'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['passing_mark'] = '';
                }
                $result[] = $dataS;
            }
        }
        $data['result'] = $result;
        return view('admin/examination.exam.exam_schedule', $data);
    }
    //For add new data of exam schedule
    public function examScheduleInsert(Request $request)
    {
        ExamScheduleModel::deleteRecord($request->exam_id, $request->class_id);
        if (!empty($request->schedule)) {
            foreach ($request->schedule as $key => $schedule) {
                if (
                    !empty($schedule['subject_id']) && !empty($schedule['exam_date']) &&
                    !empty($schedule['start_time']) && !empty($schedule['end_time'])
                    && !empty($schedule['room_number']) &&
                    !empty($schedule['full_marks']) && !empty($schedule['passing_mark'])
                ) {
                    $exam = new ExamScheduleModel;
                    $exam->class_id = $request->class_id;
                    $exam->exam_id = $request->exam_id;
                    $exam->subject_id = $schedule['subject_id'];
                    $exam->exam_date = $schedule['exam_date'];
                    $exam->start_time = $schedule['start_time'];
                    $exam->end_time = $schedule['end_time'];
                    $exam->room_number = $schedule['room_number'];
                    $exam->full_marks = $schedule['full_marks'];
                    $exam->passing_mark = $schedule['passing_mark'];
                    $exam->created_by = auth()->user()->id;
                    $exam->save();
                }
            }
        }
        return back()->with('success', 'information saved successfully');
    }



    //for show exam schedule of STUDENT SIDE
    public function myExamTimeTable(Request $request)
    {
        $class_id = auth()->user()->class_id;
        $getexam = ExamScheduleModel::getexam($class_id);
        $result = array();
        foreach($getexam as $value){
            $dataE = array();
            $dataE['exam_name'] = $value->exam_name;
            $getexamTimetable = ExamScheduleModel::getExamTimeTable($value->exam_id,$class_id);
            $resultS = array();
          foreach($getexamTimetable as $valueS){
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['room_number'] = $valueS->room_number;
                $dataS['full_marks'] = $valueS->full_marks;
                $dataS['passing_mark'] = $valueS->passing_mark;
                $resultS[] = $dataS;
          }
            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }

        $data['getRecord'] = $result;
        return view('student.my_exam_timetable', $data);

    }

    //for show exam schedule TEACHER SIDE
    public function myExamTimeTableTeacher()
    {
        $teacher_id = auth()->user()->id;
        $result = array();
        $getClass = AssigenClassTeacherModel::getMyClassSubjectGroup($teacher_id);
        foreach($getClass as $class){
            $dataC = array();
            $dataC['class_name'] = $class->class_name;
            $getExam = ExamScheduleModel::getExam($class->class_id);
            $examArray = array();
            foreach($getExam as $exam){
                $dataE = array();
                $dataE['exam_name'] = $exam->exam_name;

                $getexamTimetable = ExamScheduleModel::getExamTimeTable($exam->exam_id, $class->class_id);
                $subjectArray = array();
                foreach ($getexamTimetable as $valueS) {
                    $dataS = array();
                    $dataS['subject_name'] = $valueS->subject_name;
                    $dataS['exam_date'] = $valueS->exam_date;
                    $dataS['start_time'] = $valueS->start_time;
                    $dataS['end_time'] = $valueS->end_time;
                    $dataS['room_number'] = $valueS->room_number;
                    $dataS['full_marks'] = $valueS->full_marks;
                    $dataS['passing_mark'] = $valueS->passing_mark;
                    $subjectArray[] = $dataS;
                }
                $dataE['subject'] = $subjectArray;
                $examArray[] = $dataE;
            }
            $dataC['exam'] = $examArray;
            $result[] = $dataC;
        }
        $data['getRecord'] = $result;

        $data['header_title'] = 'Teacher Exam Timetable';
        return view('teacher.my_exam_timetable',$data);
    }

//parent exam time table
    public function ParentMyExamTimeTable($student_id)
    {
        $getStudent_info = User::getSingle($student_id);

                $class_id = $getStudent_info->class_id;
        $getexam = ExamScheduleModel::getexam($class_id);
        $result = array();
        foreach ($getexam as $value) {
            $dataE = array();
            $dataE['exam_name'] = $value->exam_name;
            $getexamTimetable = ExamScheduleModel::getExamTimeTable($value->exam_id, $class_id);
            $resultS = array();
            foreach ($getexamTimetable as $valueS) {
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['room_number'] = $valueS->room_number;
                $dataS['full_marks'] = $valueS->full_marks;
                $dataS['passing_mark'] = $valueS->passing_mark;
                $resultS[] = $dataS;
            }
            $dataE['exam'] = $resultS;
            $result[] = $dataE;

        }
        $data['stusent_info'] = $getStudent_info;
        $data['getRecord'] = $result;
        $data['header_title'] = ' exam time table';
        return view('parent.exam_timetable', $data);
    }



}//end class
