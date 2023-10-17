<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = "class";
    protected $fillable = ['name', 'status', 'created_by', 'created_at'];

    //static function get all Record
    static public function getAllRecord()
    {
        $return = ClassModel::select('class.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'class.created_by')
            ->paginate(20);
            return  $return;
    }

} //end class
