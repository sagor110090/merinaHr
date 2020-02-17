<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Company;
use Illuminate\Http\Request;
use Hr;

class CompanyController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $company = Company::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $company = Company::latest()->paginate($perPage);
        }

        return view('admin.company.index', compact('company'));
    }


    public function create()
    {
        return view('admin.company.create');
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        Company::create($requestData);

        return redirect('admin/company')->with('flash_message', 'Company added!');
    }


    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('admin.company.show', compact('company'));
    }

    public function edit($id)
    {
        if(Hr::isAdmin()){
        $company = Company::findOrFail($id);

        return view('admin.company.edit', compact('company'));
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Denied');
        }
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();
        $requestData['holidays'] = json_encode($request->holidays);

        if(Hr::isAdmin()){
        $company = Company::findOrFail($id);
        $company->update($requestData);

        return redirect()->back()->with('flash_message', 'Company updated!');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Denied');
        }
    }


    public function destroy($id)
    {
        Company::destroy($id);

        return redirect('admin/company')->with('flash_message', 'Company deleted!');
    }
}
