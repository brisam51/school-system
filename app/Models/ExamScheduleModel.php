<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScheduleModel extends Model
{
    use HasFactory;
    protected $table = 'examschedule';
    static public function getRecordSingle($class_id, $subject_id, $exam_id)
    {
        return self::where('class_id', '=', $class_id)
            ->where('subject_id', '=', $subject_id)
            ->where('exam_id', '=', $exam_id)->first();

    }

    static function deleteRecord($exam_id, $class_id)
    {

        return self::where('class_id', '=', $class_id)->where('exam_id', '=', $exam_id)->delete();
    }

    static public function getExam($class_id)
    {
        return ExamScheduleModel::select('examschedule.*', 'exams.name as exam_name')
            ->join('exams', 'exams.id', '=', 'examschedule.id')
            ->where('examschedule.class_id', '=', $class_id)
            ->groupBy('exams.id')
            ->orderBy('examschedule.id', 'desc')
            ->get();

    }


    static public function examTimeTable($exam_id, $class_id)
    {

        return self::select('examschedule.*', 'subject.name as subject_name', 'subject.type as subject_type')
            ->join('subject', 'subject.id', '=', 'examschedule.subject_id')
            ->where('examschedule.class_id', '=', $class_id)
            ->where('examschedule.exam_id', '=', $exam_id)

            ->get();
    }
}//end class
