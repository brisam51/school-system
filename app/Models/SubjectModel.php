<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    use HasFactory;
    protected $table = 'subject';
    protected $fillable = ['name', 'type', 'status', 'is_deletecreated_by'];

    static public function getAllRecord()
    {
        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'subject.created_by')
            ->where('subject.is_delete', '=', 0)
            ->paginate(5);

        return $return;
    }
    static public function getSingleRecord($id)
    {
        return self::where('id', $id)->first();
    }

    static public function getSubject()
    {
        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'subject.created_by')
            ->where('subject.is_delete', '=', 0)
            ->where('subject.status', '=', 0)
            ->orderBy('subject.name', 'asc')
            ->get();
        return $return;
    }
} //end class
