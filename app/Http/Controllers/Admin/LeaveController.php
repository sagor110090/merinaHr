<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $leave = Leave::where('employee_id', 'LIKE', "%$keyword%")
                ->orWhere('application', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('file', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $leave = Leave::latest()->paginate($perPage);
        }

        return view('admin.leave.index', compact('leave'));
    }


    public function create()
    {
        return view('admin.leave.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'employee_id' => 'required',
			'application' => 'required',
			'date' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')
                ->store('uploads', 'public');
        }

        Leave::create($requestData);

        return redirect('admin/leave')->with('flash_message', 'Leave added!');
    }


    public function show($id)
    {
        $leave = Leave::findOrFail($id);

        return view('admin.leave.show', compact('leave'));
    }

    public function edit($id)
    {
        $leave = Leave::findOrFail($id);

        return view('admin.leave.edit', compact('leave'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'employee_id' => 'required',
			'application' => 'required',
			'date' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')
                ->store('uploads', 'public');
        }

        $leave = Leave::findOrFail($id);
        $leave->update($requestData);

        return redirect('admin/leave')->with('flash_message', 'Leave updated!');
    }


    public function destroy($id)
    {
        Leave::destroy($id);

        return redirect('admin/leave')->with('flash_message', 'Leave deleted!');
    }
}
