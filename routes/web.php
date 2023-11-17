<?php

use App\Http\Controllers\FinancialController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ElevatorsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\InstallationsController;


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
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/check-login', [LoginController::class, 'checkLogin'])->name('checkLogin');



Route::middleware([AdminMiddleware::class])->group(function () {
    
    // * Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    
    // * Employees
    Route::get('/employees', [EmployeesController::class, 'employees'])->name('employees');
    Route::post('/add-employee', [EmployeesController::class, 'addEmployee'])->name('addEmployee');
    Route::post('/update-employee', [EmployeesController::class, 'updateEmployee'])->name('updateEmployee');
    Route::get('/employee-contracts/{id}', [EmployeesController::class, 'employeeContracts'])->name('employeeContracts');
    Route::post('/delete-employee-contract', [EmployeesController::class, 'deleteEmployeeContract'])->name('deleteEmployeeContract');
    Route::post('/add-employee-contract', [EmployeesController::class, 'addEmployeeContract'])->name('addEmployeeContract');


    // * Parts
    Route::get('/parts', [ElevatorsController::class, 'parts'])->name('parts');
    Route::post('/add-part', [ElevatorsController::class, 'addPart'])->name('addPart');
    Route::post('/update-part', [ElevatorsController::class, 'updatePart'])->name('updatePart');
    Route::post('/add-part-price', [ElevatorsController::class, 'addPartPrice'])->name('addPartPrice');


    // * Elevators
    Route::get('/elevators', [ElevatorsController::class, 'elevators'])->name('elevators');
    Route::post('/add-elevator', [ElevatorsController::class, 'addElevator'])->name('addElevator');
    Route::post('/update-elevator', [ElevatorsController::class, 'updateElevator'])->name('updateElevator');
    Route::get('/edit-elevator-parts/{id}', [ElevatorsController::class, 'editElevatorParts'])->name('editElevatorParts');
    Route::post('/update-elevator-parts', [ElevatorsController::class, 'updateElevatorParts'])->name('updateElevatorParts');


    // * Users
    Route::get('/users', [UsersController::class, 'users'])->name('users');
    Route::post('/add-user', [UsersController::class, 'addUser'])->name('addUser');
    Route::post('/update-user', [UsersController::class, 'updateUser'])->name('updateUser');


    // * Customers
    Route::get('/customers', [CustomersController::class, 'customers'])->name('customers');
    Route::post('/add-customer', [CustomersController::class, 'addCustomer'])->name('addCustomer');
    Route::post('/update-customer', [CustomersController::class, 'updateCustomer'])->name('updateCustomer');


      // * Installation
    Route::get('/installations', [InstallationsController::class, 'installations'])->name('installations');
    Route::post('/add-installation', [InstallationsController::class, 'addInstallation'])->name('addInstallation');
    Route::post('/add-installation-parts', [InstallationsController::class, 'addInstallationParts'])->name('addInstallationParts');

    // * Financial
    Route::get('/financials', [FinancialController::class, 'financials'])->name('financials');
    Route::post('/add-financial', [FinancialController::class, 'addFinancial'])->name('addFinancial');


    // * Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

}); // :End AdminMiddleware
