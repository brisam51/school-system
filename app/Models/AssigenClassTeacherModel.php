<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
            ->join('class', 'class.id', '=', 'assigen_class_teacher.class_id')
            ->orderBy('class_name', 'asc')
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
}//class end
