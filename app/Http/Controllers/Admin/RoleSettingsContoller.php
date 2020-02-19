<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;

class RoleSettingsContoller extends Controller
{
    //
    public function show()
    {
            $user = Auth::user();
            return view('admin.roleSettings.settings',compact('user'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'email' => 'required',
			'password' => 'required',
		]);

        $user = User::findOrFail($id);
        $requestData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        if(Hash::check($request->oldpassword,  Auth::user()->password))
        {
            $user->update($requestData);

            return redirect('/')->with('flash_message', ' updated!');
        }
        else{
            // dd(Hash::make($request->oldpassword) , Auth::user()->password);
            return redirect()->back()->with('flash_message', ' Wrong Current Password! try again later');
        }


    }
}
