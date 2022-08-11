<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\employeeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[employeeController::class, 'employee'])->name('employee');
Route::get('employeelist',[employeeController::class, 'employeelist'])->name('emp_list');
Route::post('/employeedetail',[employeeController::class, 'employeelistDetail'])->name('list');
Route::post('/',[employeeController::class, 'SaveEmpDetails'])->name('save_emp_details');
Route::post('/employee',[employeeController::class, 'updateEmp'])->name('edit_emp');
Route::get('/updateEmp',[employeeController::class, 'editEmpDetail'])->name('emp_detail');
Route::post('/employeelist',[employeeController::class, 'deleteEmp'])->name('dlt_emp');
// Route::post('/',[userController::class, 'registration'])->name('register');
// Route::post('/',[userController::class, 'login'])->name('login');

