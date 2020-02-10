<?php

namespace App\Helper;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Attendance;



class Hr
{
    public function findAll($tableName)
    {
        return DB::table($tableName)->get();
    }
    public function twoParameterWhere($tableName,$para1,$search1,$para2,$search2)
    {
        return  DB::table($tableName)->where($para1,$search1)->where($para1,$search1)->first();
    }
    public function chackedEmpoloies($date,$id)
    {
        return Attendance::where('date','like', $date)->where('employee_id',$id)->first();
    
    }

}
?>