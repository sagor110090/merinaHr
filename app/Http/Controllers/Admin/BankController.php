<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bank;
use Illuminate\Http\Request;
use Hr;

class BankController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $bank = Bank::where('bank_name', 'LIKE', "%$keyword%")
                ->orWhere('account_name', 'LIKE', "%$keyword%")
                ->orWhere('branch', 'LIKE', "%$keyword%")
                ->orWhere('account_Id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $bank = Bank::latest()->paginate($perPage);
        }

        return view('admin.bank.index', compact('bank'));
    }


    public function create()
    {
        if(Hr::isAdmin()){
            return view('admin.bank.create');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Demied');
        }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'bank_name' => 'required',
			'account_name' => 'required',
			'branch' => 'required',
			'account_Id' => 'required'
		]);
        $requestData = $request->all();
        if(Hr::isAdmin()){
        Bank::create($requestData);

        return redirect('admin/bank')->with('flash_message', 'Bank added!');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Demied');
        }
    }


    public function show($id)
    {
        $bank = Bank::findOrFail($id);

        return view('admin.bank.show', compact('bank'));
    }

    public function edit($id)
    {
        if(Hr::isAdmin()){
            $bank = Bank::findOrFail($id);

            return view('admin.bank.edit', compact('bank'));
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Demied');
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'bank_name' => 'required',
			'account_name' => 'required',
			'branch' => 'required',
			'account_Id' => 'required'
		]);
        $requestData = $request->all();
        if(Hr::isAdmin()){
            $bank = Bank::findOrFail($id);
            $bank->update($requestData);
        }

        return redirect('admin/bank')->with('flash_message', 'Bank updated!');
    }


    public function destroy($id)
    {
        if (Hr::isAdmin()) {
            Bank::destroy($id);

            return redirect('admin/bank')->with('flash_message', 'Bank deleted!');
        }
        else{
            return redirect()->back()->with('flash_message', 'Permission Demied');
        }

    }
}
