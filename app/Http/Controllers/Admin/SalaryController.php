<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Salary;
use App\EmployeePersonalInfo;
use Illuminate\Http\Request;
use Auth;
use Hr;

class SalaryController extends Controller
{

    public function index(Request $request)
    {
        if (Hr::isAdmin()) {
            $salary = Salary::all();
        }else{
            $employee_id = EmployeePersonalInfo::where('email',Auth::User()->email)->first()->employee->id;
            $salary = Salary::where('employee_id',$employee_id)->get();
        }
        return view('admin.salary.index', compact('salary'));
    }


    public function create()
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }
        return view('admin.salary.create');
    }


    public function store(Request $request)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }

        $this->validate($request, [
			'amount' => 'required',
			'month' => 'required',
			'employee_id' => 'required',
			'bank_id' => 'required',
			'chcek_no' => 'required',
			'date' => 'required'
		]);
        $requestData = $request->all();

        Salary::create($requestData);

        return redirect('admin/salary')->with('flash_message', 'Salary added!');
    }


    public function show($id)
    {
        if (Hr::isAdmin()) {

        $salary = Salary::findOrFail($id);

        return view('admin.salary.show', compact('salary'));
        }
        elseif($id == EmployeePersonalInfo::where('email',Auth::User()->email)->first()->employee->id)
        {
            $salary = Salary::findOrFail($id);

            return view('admin.salary.show', compact('salary'));
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Denied!');
        }
    }

    public function edit($id)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }

        $salary = Salary::findOrFail($id);

        return view('admin.salary.edit', compact('salary'));
    }


    public function update(Request $request, $id)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }

        $this->validate($request, [
			'amount' => 'required',
			'month' => 'required',
			'employee_id' => 'required',
			'bank_id' => 'required',
			'chcek_no' => 'required',
			'date' => 'required'
		]);
        $requestData = $request->all();

        $salary = Salary::findOrFail($id);
        $salary->update($requestData);

        return redirect('admin/salary')->with('flash_message', 'Salary updated!');
    }


    public function destroy($id)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }

        Salary::destroy($id);

        return redirect('admin/salary')->with('flash_message', 'Salary deleted!');
    }
}
