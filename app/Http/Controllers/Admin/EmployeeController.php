<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employee;
use App\EmployeePersonalInfo;
use Illuminate\Http\Request;
use Hr;
use Auth;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        if(Hr::isAdmin()){
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $employee = Employee::where('department_id', 'LIKE', "%$keyword%")
                    ->orWhere('position_id', 'LIKE', "%$keyword%")
                    ->orWhere('start_date', 'LIKE', "%$keyword%")
                    ->orWhere('end_date', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $employee = Employee::latest()->paginate($perPage);
            }
            return view('admin.employee.index', compact('employee'));
        }
        else{

            $id = EmployeePersonalInfo::where('email',Auth::User()->email)->first()->employee->id;
            $employee = Employee::where('id',$id)->get();

            return view('admin.employee.index', compact('employee'));

        }


    }


    public function create()
    {
        if(Hr::isAdmin()){
            return view('admin.employee.create');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Demied');
        }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'department_id' => 'required',
			'position_id' => 'required',
			'start_date' => 'required',
			// 'end_date' => 'required'
		]);
        $requestData = $request->all();

        if(Hr::isAdmin()){
            Employee::create($requestData);

            return redirect('admin/employee')->with('flash_message', 'Employee added!');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Demied');
        }
    }


    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        return view('admin.employee.show', compact('employee'));
    }

    public function edit($id)
    {
        if(hr::isAdmin()){
            $employee = Employee::findOrFail($id);

            return view('admin.employee.edit', compact('employee'));
        }
        elseif($id==EmployeePersonalInfo::where('email',Auth::User()->email)->first()->employee->id){
            $employee = Employee::findOrFail($id);

            return view('admin.employee.edit', compact('employee'));
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Demied');
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'department_id' => 'required',
			'position_id' => 'required',
			'start_date' => 'required',
			// 'end_date' => 'required'
		]);
        $requestData = $request->all();
            $employee = Employee::findOrFail($id);
            $employee->update($requestData);

            return redirect('admin/employee')->with('flash_message', 'Employee updated!');
    }


    public function destroy($id)
    {
        if(Hr::isAdmin()){
            Employee::destroy($id);

            return redirect('admin/employee')->with('flash_message', 'Employee deleted!');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Denied');
        }
    }
}
