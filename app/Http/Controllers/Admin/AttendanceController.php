<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Attendance;
use App\Schedule;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $attendance = Attendance::where('employee_id', 'LIKE', "%$keyword%")
                ->orWhere('attendance', 'LIKE', "%$keyword%")
                ->orWhere('late', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $attendance = Attendance::latest()->paginate($perPage);
        }

        return view('admin.attendance.index', compact('attendance'));
    }


    public function create()
    {
        return view('admin.attendance.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        // $this->validate($request, [
		// 	// 'employee_id' => 'required',
		// 	'date' => 'unique:Attendance'
        // ],
        // [
        //     'employid.unique' => 'You have to choose alrady empolyee name!',
        // ]);

         
        date_default_timezone_set('Asia/Dhaka');

        
        $requestData = $request->all();
        if (!empty($request->employee_id)) {
           
        
        for ($i=0; $i < sizeof($request->employee_id); $i++) { 
            
            if($request->employee_id[$i]){
                $validation[$i]  = Attendance::where('date',date("Y/m/d"))->where('employee_id',$request->employee_id[$i])->first();
                if (!$validation[$i]) {
                    
            $schedule[$i] = Schedule::where('employee_id',$request->employee_id[$i])->first();
            $from_time = strtotime($schedule[$i]->start_time);
            $to_time = strtotime(date( "H:i:s",time()));
            $requestData['late'] = round(abs($to_time - $from_time) / 60,2);
            $requestData['date'] = date("Y/m/d");
            $requestData['attendance'] = date("h:i:s");
            $requestData['employee_id'] = $request->employee_id[$i];
            Attendance::create($requestData);
        }

            }
            
        }
        // dd($schedule);


        return redirect('admin/attendance')->with('flash_message', 'Attendance added!');
    }
    return redirect('admin/attendance/create')->with('errors', 'select the checkbox!');

    }


    public function show($id)
    {
        $attendance = Attendance::findOrFail($id);

        return view('admin.attendance.show', compact('attendance'));
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);

        return view('admin.attendance.edit', compact('attendance'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			// 'employee_id' => 'required',
			// 'attendance' => 'required',
			// 'date' => 'required'
		]);
        $requestData = $request->all();
        
        $attendance = Attendance::findOrFail($id);
        $attendance->update($requestData);

        return redirect('admin/attendance')->with('flash_message', 'Attendance updated!');
    }


    public function destroy($id)
    {
        Attendance::destroy($id);

        return redirect('admin/attendance')->with('flash_message', 'Attendance deleted!');
    }
}
