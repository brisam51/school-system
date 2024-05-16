<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekModel extends Model
{
    use HasFactory;
    protected $table = "week";
    //this function will get all record in the week table
    static function getRecorde()
    {
        return self::get();
    }

    static public function getWeekUsingName($weekname)
    {
        return self::where('name', '=', $weekname)->first();

    }
}
