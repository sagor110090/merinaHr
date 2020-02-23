<?php

Auth::routes();

Route::get('/crudIndex', 'HomeController@crudIndex');
Route::get('/crud2index', 'HomeController@crud2index');
Route::post('/jsonSave', 'HomeController@jsonSave');
Route::post('/crudMaker', 'HomeController@crudMaker');
//------------------------------------------------------------

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/sidebar', 'HomeController@sidebar');
    Route::get('/sidebar/show', 'HomeController@sidebarShow');
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
    Route::get('admin/report/monthly', 'Admin\\ReportController@monthly');
    Route::get('admin/report/previous/monthly/', 'Admin\\ReportController@monthlyPrivousReport');
    Route::resource('admin/company', 'Admin\\CompanyController');
    Route::resource('admin/leave', 'Admin\\LeaveController');
    Route::resource('admin/leave', 'Admin\\LeaveController');
    Route::get('admin/settings', 'Admin\\RoleSettingsContoller@show');
    Route::post('admin/settings/{id}', 'Admin\\RoleSettingsContoller@update');

    Route::resource('admin/holiday', 'Admin\\HolidayController');
    // Route::get('admin/theme', 'HomeController@themes');


});


