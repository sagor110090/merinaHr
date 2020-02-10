<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $position = Position::where('position', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $position = Position::latest()->paginate($perPage);
        }

        return view('admin.position.index', compact('position'));
    }


    public function create()
    {
        return view('admin.position.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'position' => 'required'
		]);
        $requestData = $request->all();
        
        Position::create($requestData);

        return redirect('admin/position')->with('flash_message', 'Position added!');
    }


    public function show($id)
    {
        $position = Position::findOrFail($id);

        return view('admin.position.show', compact('position'));
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);

        return view('admin.position.edit', compact('position'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'position' => 'required'
		]);
        $requestData = $request->all();
        
        $position = Position::findOrFail($id);
        $position->update($requestData);

        return redirect('admin/position')->with('flash_message', 'Position updated!');
    }


    public function destroy($id)
    {
        Position::destroy($id);

        return redirect('admin/position')->with('flash_message', 'Position deleted!');
    }
}
