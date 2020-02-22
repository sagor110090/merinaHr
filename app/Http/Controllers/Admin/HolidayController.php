<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Expense;
use Illuminate\Http\Request;
use Auth;
use Hr;
use App\Holiday;

class HolidayController extends Controller
{
 
 

    public function create()
    {
        return view('admin.holiday.create');
    }

    public function store(Request $request)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }

        $this->validate($request, [
			'holiday_date' => 'required|unique:holidays'
		]);
        Holiday::create($request->all());
        return redirect('/');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $holiday = Holiday::find($id);
        return view('admin.holiday.edit',compact('holiday'));
    }
    public function update(Request $request, $id)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }

        $this->validate($request, [
			'holiday_date' => 'required|unique:holidays'
		]);
        Holiday::find($id)->update($request->all());
        return redirect('/');
    }
    public function destroy($id)
    {
        //
    }
}
