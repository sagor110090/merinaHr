<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Schedule;
use Illuminate\Http\Request;
use Hr;
use App\EmployeePersonalInfo;
use App\Employee;
use Auth;
class ScheduleController extends Controller
{

    public function index(Request $request)
    {
        if(Hr::isAdmin()){
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $schedule = Schedule::where('start_time', 'LIKE', "%$keyword%")
                    ->orWhere('end_time', 'LIKE', "%$keyword%")
                    ->orWhere('starting_date', 'LIKE', "%$keyword%")
                    ->orWhere('ending_date', 'LIKE', "%$keyword%")
                    ->orWhere('employee_id', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $schedule = Schedule::latest()->paginate($perPage);
            }
        }
        else{
            $employee_id=EmployeePersonalInfo::where('email',Auth::User()->email)->first()->employee->id;
            $schedule = Schedule::where('employee_id',$employee_id)->get();
        }

        return view('admin.schedule.index', compact('schedule'));
    }


    public function create()
    {
        if (Hr::isAdmin()) {
        return view('admin.schedule.create');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Denied!');
        }
    }


    public function store(Request $request)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }
        $this->validate($request, [
			'start_time' => 'required',
			'end_time' => 'required',
			'starting_date' => 'required',
			'employee_id' => 'required'
		]);
        $requestData = $request->all();

        Schedule::create($requestData);

        return redirect('admin/schedule')->with('flash_message', 'Schedule added!');
    }


    public function show($id)
    {
        $schedule_id = Schedule::where('id',$id)->first()->employee_id;


        if(Hr::isAdmin()){
            $schedule = Schedule::findOrFail($id);

            return view('admin.schedule.show', compact('schedule'));
        }
        elseif( $schedule_id == EmployeePersonalInfo::where('email',Auth::User()->email)->first()->employee->id ){
            $schedule = Schedule::findOrFail($id);

            return view('admin.schedule.show', compact('schedule'));
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Denied!');
        }
    }

    public function edit($id)
    {

        if (Hr::isAdmin()) {
            $schedule = Schedule::findOrFail($id);

            return view('admin.schedule.edit', compact('schedule'));
        }
        // elseif( Schedule::where('id',$id)->first()->employee->id == EmployeePersonalInfo::where('email',Auth::User()->email)->first()->employee->id)
        // {
        //     $schedule = Schedule::findOrFail($id);

        //     return view('admin.schedule.edit', compact('schedule'));
        // }
        else{
            return redirect()->back()->with('flash_message', 'Permission Denied!');
        }
    }


    public function update(Request $request, $id)
    {


        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }
        $this->validate($request, [
			'start_time' => 'required',
			'end_time' => 'required',
			'starting_date' => 'required',
			'employee_id' => 'required'
		]);
        $requestData = $request->all();


            $schedule = Schedule::findOrFail($id);
            $schedule->update($requestData);

        return redirect('admin/schedule')->with('flash_message', 'Schedule updated!');

    }


    public function destroy($id)
    {
        if (Hr::isAdmin()) {
            Schedule::destroy($id);

            return redirect('admin/schedule')->with('flash_message', 'Schedule deleted!');
        }
        else{
            return redirect()->back()->with('flash_message', ' Permission Denied');
        }
    }
}
