<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use DB;
use Artisan;
class ReportController extends Controller
{

    public function monthly(Request $request)
    {
        // if ($request->search) {
        //     $date1 = $request->search.'-31'; 
        //     $date2 = date("Y-0n-31", strtotime("first day of previous month")); 
        //     $startDate = $request->search.'-01';
        //     $endDate = $request->search.'-31';

        //     if ($date1 <= $date2) {
        //         $chackData = DB::table('monthlyReports')->whereBetween('date', [$startDate,$endDate])->get();
        //         if (sizeof($chackData) == 0) {
                    
        //                 Artisan::call("monthlyReport:save");
                    
        //         }
        //         $monthlyReports = DB::table('monthlyReports')->whereBetween('date', [$startDate,$endDate])->get();
        //         return view('admin.report.monthly',compact('monthlyReports'));
        //     }
            
        // }
        // $monthlyReports = DB::table('monthlyReports')->whereBetween('date', [date("Y-0n-0j", strtotime("first day of previous month")), date("Y-0n-j", strtotime("last day of previous month"))])->get();
        $employee = Employee::all();
        return view('admin.report.monthly',compact('employee'));
    }

    public function monthlyPrivousReport(Request $request)
    {
        $startDate = $request->search.'-01';
        $endDate = $request->search.'-31';
        $monthlyReports = DB::table('monthlyReports')->whereBetween('date', [$startDate,$endDate])->get();
        return view('admin.report.monthlyReport',compact('monthlyReports'));
        
    }


    public function create()
    {
        return view('admin.report.create');
    }


    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Report::create($requestData);

        return redirect('admin/report')->with('flash_message', 'Report added!');
    }


    public function show($id)
    {
        $report = Report::findOrFail($id);

        return view('admin.report.show', compact('report'));
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);

        return view('admin.report.edit', compact('report'));
    }


    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $report = Report::findOrFail($id);
        $report->update($requestData);

        return redirect('admin/report')->with('flash_message', 'Report updated!');
    }


    public function destroy($id)
    {
        Report::destroy($id);

        return redirect('admin/report')->with('flash_message', 'Report deleted!');
    }
}
