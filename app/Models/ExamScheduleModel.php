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

    static function deleteRecord($exam_id,$class_id){

        return self::where('class_id', '=', $class_id)->where('exam_id', '=', $exam_id)->delete();
    }
}
