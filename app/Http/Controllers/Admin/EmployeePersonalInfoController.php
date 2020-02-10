<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EmployeePersonalInfo;
use Illuminate\Http\Request;

class EmployeePersonalInfoController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $employeepersonalinfo = EmployeePersonalInfo::where('picture', 'LIKE', "%$keyword%")
                ->orWhere('age', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('mobile', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('file', 'LIKE', "%$keyword%")
                ->orWhere('employee_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $employeepersonalinfo = EmployeePersonalInfo::latest()->paginate($perPage);
        }

        return view('admin.employee-personal-info.index', compact('employeepersonalinfo'));
    }


    public function create()
    {
        return view('admin.employee-personal-info.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'employee_id' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('picture')) {
            $requestData['picture'] = $request->file('picture')
                ->store('uploads', 'public');
        }

        if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')
                ->store('uploads', 'public');
        }

        EmployeePersonalInfo::create($requestData);

        return redirect('admin/employee-personal-info')->with('flash_message', 'EmployeePersonalInfo added!');
    }


    public function show($id)
    {
        $employeepersonalinfo = EmployeePersonalInfo::findOrFail($id);

        return view('admin.employee-personal-info.show', compact('employeepersonalinfo'));
    }

    public function edit($id)
    {
        $employeepersonalinfo = EmployeePersonalInfo::findOrFail($id);

        return view('admin.employee-personal-info.edit', compact('employeepersonalinfo'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'employee_id' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('picture')) {
            $requestData['picture'] = $request->file('picture')
                ->store('uploads', 'public');
        }

        $employeepersonalinfo = EmployeePersonalInfo::findOrFail($id);
        $employeepersonalinfo->update($requestData);

        return redirect('admin/employee-personal-info')->with('flash_message', 'EmployeePersonalInfo updated!');
    }


    public function destroy($id)
    {
        EmployeePersonalInfo::destroy($id);

        return redirect('admin/employee-personal-info')->with('flash_message', 'EmployeePersonalInfo deleted!');
    }
}
