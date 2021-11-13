<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', 'CompaniesController@index');

// Route::get('/about', 'CompaniesController@about');

// Route::get('/services', 'CompaniesController@services');

Route::resource('companies', 'Company\CompaniesController');

Auth::routes();

// Route::get('/dashboard', 'DashboardController@index');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/superadmin/dashboard', [App\Http\Controllers\SuperAdmin\DashboardController::class,'index'])->name('super Admin dashboard');
//CRUD
Route::get('/superadmin/company/create', [App\Http\Controllers\Company\CompaniesController::class,'create'])->name('Register New Company');
Route::post('/superadmin/company', [App\Http\Controllers\Company\CompaniesController::class,'store'])->name('Register New Company');
Route::get('/superadmin/company/view', [App\Http\Controllers\Company\CompaniesController::class,'index'])->name('Company List');
Route::get('/superadmin/company/detail', [App\Http\Controllers\Company\CompaniesController::class,'detail'])->name('Company List');
Route::get('/superadmin/{id}/edit', [App\Http\Controllers\Company\CompaniesController::class,'edit'])->name('Register New Company');
Route::get('/superadmin/{id}/show', [App\Http\Controllers\Company\CompaniesController::class,'show'])->name('Employee List');
Route::post('/superadmin/company/update', [App\Http\Controllers\Company\CompaniesController::class,'newupdate'])->name('Register New Company');
Route::post('/superadmin/Company/delete', [App\Http\Controllers\Company\CompaniesController::class,'newdestroy'])->name('Employee List');

//  Route::get('/superadmin/company/view', [App\Http\Controllers\SuperAdmin\DashboardController::class,'index'])->name('Company List');
 
// Route::get('/superadmin/employee/dashboard', [App\Http\Controllers\Employee\DashboardController::class,'index'])->name('super Admin dashboard');
 Route::get('/superadmin/employee/create', [App\Http\Controllers\Employee\EmployeesController::class,'create'])->name('Create New Employee');
 Route::post('/superadmin/employee', [App\Http\Controllers\Employee\EmployeesController::class,'store'])->name('Create New Employee');
 Route::get('/superadmin/employee/view', [App\Http\Controllers\Employee\EmployeesController::class,'index'])->name('Employee List');
 Route::get('/superadmin/{id}/edit', [App\Http\Controllers\Employee\EmployeesController::class,'edit'])->name('Employee List');
 Route::get('/superadmin/{id}/show', [App\Http\Controllers\Employee\EmployeesController::class,'show'])->name('Employee List');

 Route::post('/superadmin/Employee/update', [App\Http\Controllers\Employee\EmployeesController::class,'newupdate'])->name('Employee List');
 Route::post('/superadmin/Employee/delete', [App\Http\Controllers\Employee\EmployeesController::class,'newdestroy'])->name('Employee List');



 Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('Admin dashboard');
 //CRUD
Route::get('/admin/company/create', [App\Http\Controllers\Company\CompaniesController::class,'create'])->name('Register New Company');
Route::post('/admin/company', [App\Http\Controllers\Admin\CompaniesController::class,'store'])->name('Register New Company');
Route::get('/admin/company/view', [App\Http\Controllers\Admin\CompaniesController::class,'index'])->name('Company List');
Route::get('/superadmin/company/detail', [App\Http\Controllers\Company\CompaniesController::class,'detail'])->name('Company List');
Route::get('/admin/company/edit', [App\Http\Controllers\Admin\CompaniesController::class,'edit'])->name('Register New Company');
Route::post('/admin/company/edit', [App\Http\Controllers\Admin\CompaniesController::class,'update'])->name('Register New Company');

//  Route::get('/superadmin/company/view', [App\Http\Controllers\SuperAdmin\DashboardController::class,'index'])->name('Company List');
 
// Route::get('/superadmin/employee/dashboard', [App\Http\Controllers\Employee\DashboardController::class,'index'])->name('super Admin dashboard');
 Route::get('/superadmin/employee/create', [App\Http\Controllers\Employee\EmployeesController::class,'create'])->name('Create New Employee');
 Route::post('/superadmin/employee', [App\Http\Controllers\Employee\EmployeesController::class,'store'])->name('Create New Employee');
 Route::get('/superadmin/employee/view', [App\Http\Controllers\Employee\EmployeesController::class,'index'])->name('Employee List');
 Route::get('/superadmin/{id}/edit', [App\Http\Controllers\Employee\EmployeesController::class,'edit'])->name('Employee List');
 Route::get('/superadmin/{id}/show', [App\Http\Controllers\Employee\EmployeesController::class,'show'])->name('Employee List');

 Route::post('/superadmin/Employee/update', [App\Http\Controllers\Employee\EmployeesController::class,'newupdate'])->name('Employee List');
 Route::post('/superadmin/Employee/delete', [App\Http\Controllers\Employee\EmployeesController::class,'newdestroy'])->name('Employee List');


Route::get('/company/dashboard', [App\Http\Controllers\Company\DashboardController::class,'index'])->name('Company dashboard');
Route::get('/company/employee/create', [App\Http\Controllers\Employee\EmployeesController::class,'create'])->name('Create New Employee');
 Route::post('/company/employee', [App\Http\Controllers\Employee\EmployeesController::class,'store'])->name('Create New Employee');
 Route::get('/company/employee/view', [App\Http\Controllers\Employee\EmployeesController::class,'index'])->name('Employee List');
 Route::get('/superadmin/company/detail', [App\Http\Controllers\Company\CompaniesController::class,'detail'])->name('Company List');
 Route::get('/company/{id}/edit', [App\Http\Controllers\Employee\EmployeesController::class,'edit'])->name('Employee List');
 Route::get('/company/{id}/show', [App\Http\Controllers\Employee\EmployeesController::class,'show'])->name('Employee List');

 Route::post('/company/Employee/update', [App\Http\Controllers\Employee\EmployeesController::class,'newupdate'])->name('Employee List');
 Route::post('/company/Employee/delete', [App\Http\Controllers\Employee\EmployeesController::class,'newdestroy'])->name('Employee List');

Route::get('/employee/dashboard', [App\Http\Controllers\Employee\DashboardController::class,'index'])->name('Employee dashboard');
Route::get('/employee/company/detail', [App\Http\Controllers\Company\CompaniesController::class,'detail'])->name('Employee dashboard');

////////////////////////

// Route::group(['as'=>'superadmin.','prefix' => 'superadmin','namespace'=>'SuperAdmin','middleware'=>['auth','superadmin']], function () {
//     //Route::get('/superadmin/dashboard', 'App\Http\Controllers\SuperAdmin\DashboardController@index')->name('dashboard');
//     Route::get('/superadmin/dashboard', [App\Http\Controllers\SuperAdmin\DashboardController::class,'index'])->name('dashboard');
// });

// Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
//     //Route::get('/admin/dashboard', 'DashboardController@index')->name('dashboard');
//     Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
// });

// Route::group(['as'=>'company.','prefix' => 'company','namespace'=>'Company','middleware'=>['auth','company']], function () {
//     //Route::get('/company/dashboard', 'DashboardController@index')->name('dashboard');
//     Route::get('/company/dashboard', [App\Http\Controllers\Company\DashboardController::class,'index'])->name('dashboard');
// });

// Route::group(['as'=>'employee.','prefix' => 'employee','namespace'=>'Employee','middleware'=>['auth','employee']], function () {
//     //Route::get('/employee/dashboard', 'DashboardController@index')->name('dashboard');
//     Route::get('/employee/dashboard', [App\Http\Controllers\Employee\DashboardController::class,'index'])->name('dashboard');

// });
