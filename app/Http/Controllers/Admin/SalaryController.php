<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $salary = Salary::where('amount', 'LIKE', "%$keyword%")
                ->orWhere('fine', 'LIKE', "%$keyword%")
                ->orWhere('month', 'LIKE', "%$keyword%")
                ->orWhere('employee_id', 'LIKE', "%$keyword%")
                ->orWhere('bank_id', 'LIKE', "%$keyword%")
                ->orWhere('chcek_no', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $salary = Salary::latest()->paginate($perPage);
        }

        return view('admin.salary.index', compact('salary'));
    }


    public function create()
    {
        return view('admin.salary.create');
    }


    public function store(Request $request)
    {
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
        $salary = Salary::findOrFail($id);

        return view('admin.salary.show', compact('salary'));
    }

    public function edit($id)
    {
        $salary = Salary::findOrFail($id);

        return view('admin.salary.edit', compact('salary'));
    }


    public function update(Request $request, $id)
    {
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
        Salary::destroy($id);

        return redirect('admin/salary')->with('flash_message', 'Salary deleted!');
    }
}
