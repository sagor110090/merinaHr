<?php

namespace App\Helper;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Attendance;
use session;
use Auth;



class Hr
{
    public function isAdmin()
    {
        return DB::table('users')->where('email',Auth::User()->email)->where('role','admin')->first();
        
    }
    public function isUser()
    {
        return DB::table('users')->where('email',Auth::User()->email)->where('role','user')->first();
        
    }
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
    public function coutTableRow($tableName)
    {
        return DB::table($tableName)->count();
    }
    public function coutTableRowDaly($tableName)
    {
        return DB::table($tableName)->where('date','like', date('Y-m-d'))->get();
    }

    public function companyHolidays()
    {
        return DB::table('companies')->first()->holidays;
    }
    public function companyWorkingHour()
    {
        return DB::table('companies')->first()->working_hour;
    }

    function cal_days_in_year($year){
        $days=0; 
        for($month=1;$month<=12;$month++){ 
            $days = $days + cal_days_in_month(CAL_GREGORIAN,$month,$year);
         }
     return $days;
    }
    function getDays($start, $iDays, $aDays,$format) 
    {
      $dStart = date('d', strtotime($start));
      $YM     = substr($start, 0, 8);
    
      $dateCount =[];
      for($i=$dStart; $i<=$iDays; $i++)
      {
        $ok   = strtotime($YM.$i);
        if($ok)
        {
          $date = date('D', $ok);
          foreach($aDays as $key=> $day)
          {
            $date = strtolower($date);         
            $day  = strtolower($day);         
            if( $date===$day )
            { 
              $dateCount[$i] = date($format, $ok);
            }
    
          } 
        }
    }

        return $dateCount;
        
    }
    public function monthlyReport()
    {
        return DB::table('monthlyReports')->get();
    }

    public function countWorkingDayInMonth($offday)
    {
        $dayOfyear = Hr::cal_days_in_year(date('Y'));
        return cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y')) - count(Hr::getDays(date("Y/m/01"),$dayOfyear,$offday,'D, M jS Y'));
            
    }

    public function sessionCreate()
    {
        return Session::get('key');
    }
}
   


?>