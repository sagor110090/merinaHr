<?php

namespace App\Helper;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Attendance;
use App\Leave;
use App\Holiday;
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
        return json_decode(DB::table('companies')->first()->holidays);

    }
    
    public function companyBreakTime()
    {
        return DB::table('companies')->first()->break_time;
    }
    public function companyInfo()
    {
        return DB::table('companies')->first();
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
        if ($aDays != null) {
          
        
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
        // dd($dateCount);
        return count($dateCount);
        
    }
}
    public function monthlyReport()
    {
        return DB::table('monthlyReports')->get();
    }
    public function restDay($employee_id)
    {
        $restDay = json_decode(DB::table('schedules')->where('employee_id',$employee_id)->first()->restDay);
        $dayOfyear = Hr::cal_days_in_year(date('Y'));
        return  Hr::getDays(date("Y/m/01"),$dayOfyear,$restDay,'D, M jS Y');
    }
    public function restDaySchedule($employee_id)
    {
        $restDay = json_decode(DB::table('schedules')->where('employee_id',$employee_id)->first()->restDay);
        $dayOfyear = Hr::cal_days_in_year(date('Y'));
        return  Hr::getDays(date("Y-m-01",strtotime("-1 month")),$dayOfyear,$restDay,'D, M jS Y');
    }
    public function countWorkingDayInMonth($offday)
    {
        // dd($offday[0]);
        $dayOfyear = Hr::cal_days_in_year(date('Y'));
        return cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y')) - Hr::getDays(date("Y/m/01"),$dayOfyear,$offday[0],'D, M jS Y');
              
    }

    public function countWorkingDayInMonthSchedule($offday)
    {
        // dd($offday[0]);
        $dayOfyear = Hr::cal_days_in_year(date('Y'));
        return cal_days_in_month(CAL_GREGORIAN,date('m'),date('Y')) - Hr::getDays(date("Y-m-01",strtotime("-1 month")),$dayOfyear,$offday[0],'D, M jS Y');
              
    }
    
    public function totalLeave($employee_id)
    {
        return Leave::where('status','approve')->where('employee_id',$employee_id)->whereRaw('MONTH(date) = ?', date('m'))->count();
       
    }

    public function totalLeaveSchedule($employee_id)
    {
        return Leave::where('status','approve')->where('employee_id',$employee_id)->whereRaw('MONTH(date) = ?', date("m",strtotime("-1 month")))->count();
       
    }
    public function totalPresent($employee_id)
    {
        $attendance = Attendance::where('employee_id',$employee_id)->whereRaw('MONTH(date) = ?', date('m'))->count();
        return $attendance;
       
    }
    public function totalPresentSchedule($employee_id)
    {
        $attendance = Attendance::where('employee_id',$employee_id)->whereRaw('MONTH(date) = ?', date("m",strtotime("-1 month")))->count();
        return $attendance;
       
    }
    public function totalHoliday()
    {
        $holiday = Holiday::whereRaw('MONTH(holiday_date) = ?', date('m'))->count();
        return $holiday;
       
    }
    public function totalHolidaySchedule()
    {
        $holiday = Holiday::whereRaw('MONTH(holiday_date) = ?', date("m",strtotime("-1 month")))->count();
        return $holiday;
       
    }
    public function timeDifference($to_time,$from_time)
    {
        $to_time = strtotime("2008-12-13 10:42:00");
        $from_time = strtotime("2008-12-13 10:21:00");
        echo round(abs($to_time - $from_time) / 60,2);
    }
    function minutes($time){
        $time = explode(':', $time);
        return ($time[0]*60) + ($time[1]) + ($time[2]/60);
        }

    public function sessionCreate()
    {
        return Session::get('key');
    }
}
   


?>