<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\LaravelVerifyNewEmail\MustVerifyNewEmail;
use Request;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_pic',
        'last_name',
        'admission_number',
        'roll_number',
        'class_id',
        'gender',
        'date_of_brith',
        'caste',
        'religion',
        'mobile_number',
        'admission_date',
        'height',
        'weight',
        'status',
        'email',
        'Password',
        'blood_group',
        'parent_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //for rest forget password
    static public function getSingle($id)
    {
        $record = User::find($id);
        return $record;
    }



    //get All student
    static public function getStudent()
    {

        $return = self::select('users.*', 'class.name as class_name', 'parent.name as parent_name', 'parent.last_name as parent_last_name')

            ->join('class', 'users.class_id', '=', 'class.id', 'left')
            ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
            ->where('users.user_type', '=', 2)
            ->paginate(10);
        return $return;
    }

    //get profile information
    public function getProfile()
    {
        if (!empty($this->profile_pic) && file_exists('upload/profile/' . $this->profile_pic)) {
            return url('upload/profile/' . $this->profile_pic);
        } else {
            return "";
        }
    }


    //get all parent
    static public function getParents()
    {
        $return = self::select('users.*')
            ->where('user_type', '=', 4)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return $return;
    }
    //get student by search
    static public function getSearchStudent()
    {
        if (!empty(Request::get('id')) || !empty(Request::get('name')) || !empty(Request::get('last_name')) || !empty(Request::get('email'))) {
            $return = self::select('users.*', 'class.name as class_name', 'parent.name as parent_name')
                ->join('class', 'users.class_id', '=', 'class.id', 'left')
                ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
                ->where('users.user_type', '=', 2);
            if (!empty(Request::get('id'))) {
                $return = $return->where('users.id', 'like', '%' . Request::get("id") . '%')->get();
            }

            if (!empty(Request::get('name'))) {
                $return = $return->where('users.name', 'like', '%' . Request::get("name") . '%')->get();
            }

            if (!empty(Request::get('last_name'))) {
                $return = $return->where('users.last_name', 'like', '%' . Request::get("last_name") . '%')->get();
            }

            if (!empty(Request::get('email'))) {
                $return = $return->where('users.email', 'like', '%' . Request::get("email") . '%')->get();
            }


            return $return;
        }
    } //end function

    //get student for parent
    static public function getMyStudent($parent_id)
    {
        $return = self::select('users.*', 'class.name as class_name', 'parent.name as parent_name')
            ->join('class', 'users.class_id', '=', 'class.id', 'left')
            ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
            ->where('users.parent_id', '=', $parent_id)
            ->where('users.user_type', '=', 2)
            ->orderBy('users.id', 'desc')
            ->get();

        return $return;
    }

    //Show All Information about teachers
    static public function getTeacher()
    {
        $return = self::select('users.*')
            ->where('users.user_type', '=', 3)->get();
        return $return;
    }

    //get teach for assigen new class to him
    static public function getClassTeacher()
    {
        $return = self::select('users.*')
            ->where('users.user_type', '=', 3)
            ->orderBy('users.name', 'desc')
            ->get();
        return $return;
    }

    //work for teacher side
    static public function getTeacherStudent($teacher_id)
    {
        $return = self::select('users.*','class.name as class_name')
            ->join('class', 'class.id', '=', 'users.class_id')
            ->join('assigen_class_teacher', 'assigen_class_teacher.class_id', '=', 'class.id')
            ->where('assigen_class_teacher.teacher_id', '=', $teacher_id)
            ->where('assigen_class_teacher.status', '=', 0)
            ->where('users.user_type', '=', 2)
            ->groupBy('users.id')
            ->paginate(10);
        return $return;
    }
} //end class
