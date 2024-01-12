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

    static public function getStudent()
    {

        $return = self::select('users.*', 'class.name as class_name')
            ->join('class', 'users.class_id', '=', 'class.id', 'left')
            ->where('users.user_type', '=', 2)
            ->paginate(10);
        return $return;
    }

    public function getProfile()
    {
        if (!empty($this->profile_pic) && file_exists('upload/profile/' . $this->profile_pic)) {
            return url('upload/profile/' . $this->profile_pic);
        } else {
            return "";
        }
    }



    static public function getParents()
    {
        $return = self::select('users.*')
            ->where('user_type', '=', 4)
            ->orderBy('id','desc')
            ->paginate(10);


        return $return;


    }
} //end class
