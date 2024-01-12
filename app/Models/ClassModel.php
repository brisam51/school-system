<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = "class";
    protected $fillable = ['name', 'status', 'created_by', 'created_at'];


    //get singel record
    static public function getSingleRecord($id)
    {
        return self::where('id', $id)->first();
    }

    //static function get all Record
    static public function getAllRecord()
    {
        $return = ClassModel::select('class.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'class.created_by')
            ->paginate(10);
        return $return;
    }
    static public function getClass(){
        return ClassModel::select('class.*')
        ->join('users','users.id','class.created_by')
        ->where('class.is_deleted','=',0)
        ->where('class.status','=',0)
        ->orderBy('class.name','desc')->get();
    }


} //end class
