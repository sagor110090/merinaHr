<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index(Request $request)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $department = Department::where('department', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $department = Department::latest()->paginate($perPage);
        }

        return view('admin.department.index', compact('department'));
    }


    public function create()
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }
        return view('admin.department.create');
    }


    public function store(Request $request)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }
        $this->validate($request, [
			'department' => 'required'
		]);
        $requestData = $request->all();

        Department::create($requestData);

        return redirect('admin/department')->with('flash_message', 'Department added!');
    }


    public function show($id)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }
        $department = Department::findOrFail($id);

        return view('admin.department.show', compact('department'));
    }

    public function edit($id)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }
        $department = Department::findOrFail($id);

        return view('admin.department.edit', compact('department'));
    }


    public function update(Request $request, $id)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }
        $this->validate($request, [
			'department' => 'required'
		]);
        $requestData = $request->all();

        $department = Department::findOrFail($id);
        $department->update($requestData);

        return redirect('admin/department')->with('flash_message', 'Department updated!');
    }


    public function destroy($id)
    {
        if (!Hr::isAdmin()) { return redirect()->back()->with('flash_message', 'Permission Denied!');  }
        Department::destroy($id);

        return redirect('admin/department')->with('flash_message', 'Department deleted!');
    }
}
