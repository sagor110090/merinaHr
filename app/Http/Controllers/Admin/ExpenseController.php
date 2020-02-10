<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $expense = Expense::where('expanse_categories_id', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $expense = Expense::latest()->paginate($perPage);
        }

        return view('admin.expense.index', compact('expense'));
    }


    public function create()
    {
        return view('admin.expense.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'expanse_categories_id' => 'required',
			'amount' => 'required',
			'date' => 'required'
		]);
        $requestData = $request->all();
        
        Expense::create($requestData);

        return redirect('admin/expense')->with('flash_message', 'Expense added!');
    }


    public function show($id)
    {
        $expense = Expense::findOrFail($id);

        return view('admin.expense.show', compact('expense'));
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);

        return view('admin.expense.edit', compact('expense'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'expanse_categories_id' => 'required',
			'amount' => 'required',
			'date' => 'required'
		]);
        $requestData = $request->all();
        
        $expense = Expense::findOrFail($id);
        $expense->update($requestData);

        return redirect('admin/expense')->with('flash_message', 'Expense updated!');
    }


    public function destroy($id)
    {
        Expense::destroy($id);

        return redirect('admin/expense')->with('flash_message', 'Expense deleted!');
    }
}
