<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/crudIndex', 'HomeController@crudIndex');
Route::get('/crud2index', 'HomeController@crud2index');
Route::post('/jsonSave', 'HomeController@jsonSave');
Route::post('/crudMaker', 'HomeController@crudMaker');
//------------------------------------------------------------

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'HomeController@index');
    Route::resource('admin/department', 'Admin\\DepartmentController');
    Route::resource('admin/department', 'Admin\\DepartmentController');
    Route::resource('admin/department', 'Admin\\DepartmentController');
    Route::resource('admin/position', 'Admin\\PositionController');
    Route::resource('admin/employee', 'Admin\\EmployeeController');
    Route::resource('admin/employee-personal-info', 'Admin\\EmployeePersonalInfoController');
    Route::resource('admin/attendance', 'Admin\\AttendanceController');
    Route::resource('admin/schedule', 'Admin\\ScheduleController');
    Route::resource('admin/bank', 'Admin\\BankController');
    Route::resource('admin/transaction', 'Admin\\TransactionController');
    Route::resource('admin/salary', 'Admin\\SalaryController');
    Route::resource('admin/expanse-category', 'Admin\\ExpanseCategoryController');
    Route::resource('admin/expense', 'Admin\\ExpenseController');
    Route::resource('admin/salary', 'Admin\\SalaryController');
});

