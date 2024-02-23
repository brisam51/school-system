<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ClassSubjectModel extends Model
{
    use HasFactory;
    protected $table = "class_subject";
    protected $fillable = ['class_id', 'class_id', 'created_by', 'status'];


    static public function getRecord()
    {
        $return = self::select('class_subject.*', 'class.name as class_name', 'subject.name as subject_name', 'users.name as created_by_name')
            ->join('class', 'class.id', '=', 'class_subject.class_id')
            ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
            ->join('users', 'users.id', '=', 'class_subject.created_by')
            ->where('class_subject.is_delete','=',0);

        if (!empty(Request::get('class_name'))) {
            $return = $return->where('class.name', 'like', '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('subject_name'))) {
            $return = $return->where('subject.name', 'like', '%' . Request::get('subject_name') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->where('classsubject.created_at', 'like', '%' . Request::get('date') . '%');
        }
        $return = $return->orderBy('class.name', 'desc')
            ->paginate(10);
        return $return;
    }

    static public function getAllreadyFirst($class_id, $subject_id)
    {
        return self::where('class_id', '=', $class_id)->where('subject_id', '=', $subject_id)->first();
    }
    static public function getSingel($id){
        return ClassSubjectModel::find($id);

    }



static public function getAssignSubjectID($class_id){
return self::where('class_id','=', $class_id)->where('is_delete','=',0)->get();
}

static public function deleteSubject($class_id){
    return ClassSubjectModel::where('class_id','=', $class_id)->delete();
}

static function mySubject($class_id){
    return  self::select('class_subject.*', 'subject.name as subject_name','subject.type as subject_type','class.name as class_name')
            ->join('class', 'class.id', '=', 'class_subject.class_id')
            ->join('subject', 'subject.id', '=', 'class_subject.subject_id')
            //->join('users', 'users.id', '=', 'class_subject.created_by')
            ->where('class_subject.class_id','=',$class_id)
            ->where('class_subject.status','=',0)
            ->where('class_subject.is_delete','=',0)
            ->get();
}

}//end class
