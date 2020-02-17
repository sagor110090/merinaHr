<?php
$mohthlyReportCheck = DB::table('monthlyreports')->get();
$checkData = DB::table('monthlyReports')->whereBetween('date', [date("Y-0n-0j", strtotime("first day of previous month")),date("Y-0n-j", strtotime("last day of previous month"))])->get();   
if (sizeof($checkData) == 0) {
Artisan::call("monthlyReport:save");
}  
?>