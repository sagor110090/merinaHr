<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ExpanseCategory;
use Illuminate\Http\Request;
use Hr;

class ExpanseCategoryController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $expansecategory = ExpanseCategory::where('category_name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $expansecategory = ExpanseCategory::latest()->paginate($perPage);
        }

        return view('admin.expanse-category.index', compact('expansecategory'));
    }


    public function create()
    {
        if(Hr::isAdmin()){
            return view('admin.expanse-category.create');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Demied');
        }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'category_name' => 'required'
		]);
        $requestData = $request->all();
        if(Hr::isAdmin()){
            ExpanseCategory::create($requestData);

            return redirect('admin/expanse-category')->with('flash_message', 'ExpanseCategory added!');
        }
    }


    public function show($id)
    {
        $expansecategory = ExpanseCategory::findOrFail($id);

        return view('admin.expanse-category.show', compact('expansecategory'));
    }

    public function edit($id)
    {
        if(Hr::isAdmin()){
            $expansecategory = ExpanseCategory::findOrFail($id);

            return view('admin.expanse-category.edit', compact('expansecategory'));
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Demied');
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'category_name' => 'required'
		]);
        $requestData = $request->all();
        if(Hr::isAdmin()){
            $expansecategory = ExpanseCategory::findOrFail($id);
            $expansecategory->update($requestData);
        }
        return redirect('admin/expanse-category')->with('flash_message', 'ExpanseCategory updated!');
    }


    public function destroy($id)
    {
        if(Hr::isAdmin()){
            ExpanseCategory::destroy($id);

            return redirect('admin/expanse-category')->with('flash_message', 'ExpanseCategory deleted!');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Demied');
        }
    }
}
