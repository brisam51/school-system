<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ExamModel extends Model
{
    use HasFactory;
    protected $table = 'exams';
    protected $fillable = ['name', 'note'];



    static public function index()
    {

        $result = self::select('exams.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'exams.created_by')
            ->where('exams.is_deleted', '=', 0);
        if (!empty(Request::get('name'))) {
            $result = $result->where('exams.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('exam_date'))) {
            $result = $result->whereDate('exams.exam_date', '=',  Request::get('exam_date') );
        }
        $result = $result->paginate(5);
        return $result;
    }
    static public function getExamRecord()
    {
        $result = self::select('exams.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'exams.created_by')
            ->where('exams.is_deleted', '=', 0)
            ->get();
        return $result;
    }


    static public function getSingleRecord($id)
    {
        return self::where('id', '=', $id)->first();
    }

}//end model
