<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Employee;
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
        $employee = Employee::all();

        foreach ($employee as $item){
            $employee_id = $item->id;
            $late = round($item->attendance->whereBetween('date', [date("Y-0n-0j", strtotime("first day of previous month")), date("Y-0n-j", strtotime("last day of previous month"))])->sum('late'));
            $salary = round((float)$item->salary - $item->attendance->whereBetween('date', [date("Y-0n-0j", strtotime("first day of previous month")), date("Y-0n-j", strtotime("last day of previous month"))])->sum('late')*(float)$item->salary/(float)(Hr::countWorkingDayInMonth([Hr::companyHolidays()])*Hr::companyWorkingHour()*60));
            DB::table('monthlyReports')->insert(
                [
                    'employee_id' => $employee_id,
                    'fine' => $item->salary - $salary,
                    'late' => $late,
                    'salary' => $salary,
                    'date' => date("Y-n-01", strtotime("first day of previous month"))
                ]
            );
            
    }
    
        
    }
}