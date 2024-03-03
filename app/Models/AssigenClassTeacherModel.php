<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class AssigenClassTeacherModel extends Model
{
    use HasFactory;
    protected $table = 'assigen_class_teacher';
    protected $fillable = [
        'class_id',
        'treacher_id',
        'status',
        'is_deleted',
        'created_by',
        'created_at',
        'updated_at'
    ];




    static public function getRecord()
    {
        $return = self::select('assigen_class_teacher.*', 'class.name as class_name', 'teacher.name as teacher_name', 'teacher.last_name as teacher_last_name', 'users.name as created_by_name')
            ->join('users as teacher', 'teacher.id', '=', 'assigen_class_teacher.teacher_id')
            ->join('users', 'users.id', '=', 'assigen_class_teacher.created_by')
            ->join('class', 'class.id', '=', 'assigen_class_teacher.class_id');
        if (!empty(Request::get('class_name'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('teacher_name'))) {
            $return = $return->where('teacher.name', 'like', '%' . Request::get('teacher_name') . '%');
        }
        if (!empty(Request::get('status'))) {
            $status=(Request::get('status')==100)? 0:1;
            $return = $return->where('assigen_class_teacher.status', '=',$status);
        }
        if (!empty(Request::get('date'))) {

            $return = $return->whereDate('assigen_class_teacher.created_at', '=',Request::get('date'));
        }
        $return = $return->orderBy('class_name', 'asc')
            ->paginate(10);
        return $return;
    }


    static public function getAllreadyFirst($class_id, $teacher_id)
    {
        return self::where('class_id', '=', $class_id)->where('teacher_id', '=', $teacher_id)->first();
    }
    //get single record which assgend to teacher
    static public function getSingle($id)
    {

        return self::find($id);
    }


    static public function getAssigenTeacherID($class_id)
    {
        return self::where('class_id', '=', $class_id)->get();
    }

    static public function deleteTeacher($class_id)
    {
        return self::where('class_id', '=', $class_id)->delete();
    }

    static public function getSearch()
    {

        $return = self::select('assigen_class_teacher.*', 'class.name as class_name', 'teacher.name as teacher_name', 'teacher.last_name as teacher_last_name', 'users.name as created_by_name')
            ->join('users as teacher', 'teacher.id', '=', 'assigen_class_teacher.teacher_id')
            ->join('users', 'users.id', '=', 'assigen_class_teacher.created_by')
            ->join('class', 'class.id', '=', 'assigen_class_teacher.class_id')
            ->orderBy('class_name', 'asc')
            ->paginate(10);
        return $return;

    }

    //get my class subject teacher side
    static public function getMyClassSubject($teacher_id){
       return self::select('assigen_class_teacher.*','class.name as class_name','subject.name as subject_name','subject.type as subject_type')
        ->join('class','class.id','=','assigen_class_teacher.class_id')
        ->join('class_subject','class_subject.class_id','=','class.id')
        ->join('subject','subject.id','=','class_subject.subject_id')
        ->where('assigen_class_teacher.status','=',0)
        ->where('assigen_class_teacher.teacher_id','=',$teacher_id)
        ->get();


    }
}//class end
