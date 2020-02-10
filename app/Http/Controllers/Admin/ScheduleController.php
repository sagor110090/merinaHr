<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function index(Request $request)
    {
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

        return view('admin.schedule.index', compact('schedule'));
    }


    public function create()
    {
        return view('admin.schedule.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'start_time' => 'required',
			'end_time' => 'required',
			'starting_date' => 'required',
			'ending_date' => 'required',
			'employee_id' => 'required'
		]);
        $requestData = $request->all();
        
        Schedule::create($requestData);

        return redirect('admin/schedule')->with('flash_message', 'Schedule added!');
    }


    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);

        return view('admin.schedule.show', compact('schedule'));
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);

        return view('admin.schedule.edit', compact('schedule'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'start_time' => 'required',
			'end_time' => 'required',
			'starting_date' => 'required',
			'ending_date' => 'required',
			'employee_id' => 'required'
		]);
        $requestData = $request->all();
        
        $schedule = Schedule::findOrFail($id);
        $schedule->update($requestData);

        return redirect('admin/schedule')->with('flash_message', 'Schedule updated!');
    }


    public function destroy($id)
    {
        Schedule::destroy($id);

        return redirect('admin/schedule')->with('flash_message', 'Schedule deleted!');
    }
}
