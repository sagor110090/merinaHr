<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EmployeePersonalInfo;
use Illuminate\Http\Request;
use App\User;
use App\Employee;
use DB;
use Illuminate\Support\Facades\Hash;
use Hr;
use Auth;


class EmployeePersonalInfoController extends Controller
{

    public function index(Request $request)
    {
        if(Hr::isAdmin()){
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
                    ->all();
            } else {
                $employeepersonalinfo = EmployeePersonalInfo::all();
            }
        }
        else{
            $employeepersonalinfo = EmployeePersonalInfo::where('email',Auth::User()->email)->get();
        }


        return view('admin.employee-personal-info.index', compact('employeepersonalinfo'));
    }


    public function create()
    {
        if(Hr::isAdmin()){
            return view('admin.employee-personal-info.create');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Denied!');
        }
    }


    public function store(Request $request)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }
        $this->validate($request, [
			'employee_id' => 'required|unique:employee_personal_infos',
			'email' => 'required|unique:employee_personal_infos',
		]);
        $employee = Employee::where('id',$request->employee_id)->first();
        $name = $employee->fname.' '.$employee->lname;
        $user = new User;
        $user->name = $name;
        $user->email = $request->email;
        $user->role = 'user';
        $user->password = Hash::make('12345678');
        $user->save();

        $requestData = $request->all();
                if ($request->hasFile('picture')) {
            $requestData['picture'] = $request->file('picture')
                ->store('uploads', 'public');
        }

        if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')
                ->store('uploads', 'public');
        }

        if(Hr::isAdmin()){
        EmployeePersonalInfo::create($requestData);

        return redirect('admin/employee-personal-info')->with('flash_message', 'EmployeePersonalInfo added!');
        }
    }


    public function show($id)
    {
        $employeepersonalinfo = EmployeePersonalInfo::findOrFail($id);

        return view('admin.employee-personal-info.show', compact('employeepersonalinfo'));
    }

    public function edit($id)
    {

        if (Hr::isAdmin()) {
            $employeepersonalinfo = EmployeePersonalInfo::findOrFail($id);
            return view('admin.employee-personal-info.edit', compact('employeepersonalinfo'));
        }
        elseif($id==EmployeePersonalInfo::where('email',Auth::User()->email)->first()->id){

            $employeepersonalinfo = EmployeePersonalInfo::findOrFail($id);
            return view('admin.employee-personal-info.edit', compact('employeepersonalinfo'));
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Denied');
        }


    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'employee_id' => 'required|unique:employee_personal_infos',
			'email' => 'required|unique:employee_personal_infos',
		]);
        $requestData = $request->all();
                if ($request->hasFile('picture')) {
            $requestData['picture'] = $request->file('picture')
                ->store('uploads', 'public');
        }
        $user = new User;
        $user->name = DB::table('employees')->where('id',$request->employee_id)->first()->fname;


            $employeepersonalinfo = EmployeePersonalInfo::findOrFail($id);
            $employeepersonalinfo->update($requestData);

            return redirect('admin/employee-personal-info')->with('flash_message', 'EmployeePersonalInfo updated!');

    }


    public function destroy($id)
    {
        if(Hr::isAdmin()){
            EmployeePersonalInfo::destroy($id);

            return redirect('admin/employee-personal-info')->with('flash_message', 'EmployeePersonalInfo deleted!');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Denied!');
        }
    }
}
