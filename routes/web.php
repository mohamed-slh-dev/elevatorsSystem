<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ElevatorsController;
use App\Http\Controllers\UsersController;

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

//dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

//employees
Route::get('/employees', [EmployeesController::class, 'employees'])->name('employees');
Route::post('/add-employee', [EmployeesController::class, 'addEmployee'])->name('addEmployee');
Route::post('/update-employee', [EmployeesController::class, 'updateEmployee'])->name('updateEmployee');
Route::get('/employee-contracts/{id}', [EmployeesController::class, 'employeeContracts'])->name('employeeContracts');
Route::post('/delete-employee-contract', [EmployeesController::class, 'deleteEmployeeContract'])->name('deleteEmployeeContract');
Route::post('/add-employee-contract', [EmployeesController::class, 'addEmployeeContract'])->name('addEmployeeContract');


//parts
Route::get('/parts', [ElevatorsController::class, 'parts'])->name('parts');
Route::post('/add-part', [ElevatorsController::class, 'addPart'])->name('addPart');
Route::post('/add-part-price', [ElevatorsController::class, 'addPartPrice'])->name('addPartPrice');


//elevators
Route::get('/elevators', [ElevatorsController::class, 'elevators'])->name('elevators');
Route::post('/add-elevator', [ElevatorsController::class, 'addElevator'])->name('addElevator');


//users
Route::get('/users', [UsersController::class, 'users'])->name('users');
Route::post('/add-user', [UsersController::class, 'addUser'])->name('addUser');


//customers
Route::get('/customers', [CustomersController::class, 'customers'])->name('customers');
Route::post('/add-customer', [CustomersController::class, 'addCustomer'])->name('addCustomer');
Route::post('/update-customer', [CustomersController::class, 'updateCustomer'])->name('updateCustomer');
