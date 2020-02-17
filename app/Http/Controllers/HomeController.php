<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use DB;
use Session;


class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('dashboard');
    }
    public function sidebar()
    {
        $value = Session::get('key');
        // dd($value);
        if ($value != 'on') {
            Session::put('key', 'on');
            return 'created';
        }else{
            Session::forget('key');
            Session::put('key', 'off');

            return 'forget';
        }
        
    }
    public function sidebarShow()
    {
        return response()->json(Session::get('key'));
    }
    public function crud2index()
    {
        return view('crud2');
    }

    public function crudIndex()
    {
        return view('crud');
    }

   

    
}