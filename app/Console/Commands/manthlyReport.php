<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Schedule;
use Hr;
use DB;
class manthlyReport extends Command
{

    protected $signature = 'monthlyReport:save';


    protected $description = 'daily it save the entry of the salary of the employee';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $schedule = Schedule::all();

        foreach ($schedule as $item){
                    $restDay = Hr::restDaySchedule($item->employee_id);
                    $employee_id = $item->employee->fname.' '.$item->employee->lname;
                    $workingDay = Hr::countWorkingDayInMonthSchedule([Hr::companyHolidays()]) - $restDay ;
                    $late = round($item->employee->attendance->whereBetween('date', [date("Y-m-01",strtotime("-1 month")), date("Y-m-31",strtotime("-1 month"))])->sum('late'));
                    $dalySalary = (float)$item->employee->salary/(float)($workingDay*(Hr::minutes(date('G:i:s', strtotime($item->end_time) - strtotime($item->start_time)))));
                    $schedule = Hr::minutes(date('G:i:s', strtotime($item->end_time) - strtotime($item->start_time))) - Hr::companyBreakTime();
                    $salary = round((float)$item->employee->salary - $late*$dalySalary - $schedule*($workingDay - Hr::totalPresentSchedule($item->employee->id)) * $dalySalary + $schedule*Hr::totalLeaveSchedule($item->employee->id)*$dalySalary + $schedule*Hr::totalHolidaySchedule()*$dalySalary);
            DB::table('monthlyreports')->insert(
                [
                    'employee_id' => $item->employee_id,
                    'fine' => $item->employee->salary - $salary, 
                    'late' => $late,
                    'salary' => $salary,
                    'date' => date("Y-m-01",strtotime("-1 month"))
                ]
            );

    }


    }
}
