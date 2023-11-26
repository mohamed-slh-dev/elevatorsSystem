<?php

use App\Http\Controllers\FinancialController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SuppliersController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ElevatorsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\InstallationsController;
use App\Http\Controllers\MaintenanceController;



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



    // * Suppliers
    Route::get('/suppliers', [SuppliersController::class, 'suppliers'])->name('suppliers');
    Route::post('/add-supplier', [SuppliersController::class, 'addSupplier'])->name('addSupplier');
    Route::post('/update-supplier', [SuppliersController::class, 'updateSupplier'])->name('updateSupplier');



    // * Customers
    Route::get('/customers', [CustomersController::class, 'customers'])->name('customers');
    Route::post('/add-customer', [CustomersController::class, 'addCustomer'])->name('addCustomer');
    Route::post('/update-customer', [CustomersController::class, 'updateCustomer'])->name('updateCustomer');



    // * Installation
    Route::get('/installations-bills', [InstallationsController::class, 'installationsBills'])->name('installationsBills');
    Route::get('/installations-quotations', [InstallationsController::class, 'installationsQuotations'])->name('installationsQuotations');

    Route::post('/add-installation', [InstallationsController::class, 'addInstallation'])->name('addInstallation');
    Route::post('/add-installation-parts', [InstallationsController::class, 'addInstallationParts'])->name('addInstallationParts');

    
    // ! information update
    Route::post('/update-installation', [InstallationsController::class, 'updateInstallation'])->name('updateInstallation');

    // ! parts update
    Route::get('/edit-installation-parts/{id}/{type}', [InstallationsController::class, 'editInstallationParts'])->name('editInstallationParts');
    Route::post('/update-installation-parts/{id}/{type}', [InstallationsController::class, 'updateInstallationParts'])->name('updateInstallationParts');

    // ! delete
    Route::post('/delete-installation', [InstallationsController::class, 'deleteInstallation'])->name('deleteInstallation');
    
    // ! print
    Route::get('/print-installation/{id}/{type}', [InstallationsController::class, 'printInstallation'])->name('printInstallation');








    // * Maintenance
    Route::get('/maintenance', [MaintenanceController::class, 'maintenance'])->name('maintenance');

    Route::post('/add-maintenance', [MaintenanceController::class, 'addMaintenance'])->name('addMaintenance');
    Route::post('/add-maintenance-parts', [MaintenanceController::class, 'addMaintenanceParts'])->name('addMaintenanceParts');
   
       
    // ! information update
    Route::post('/update-maintenance', [MaintenanceController::class, 'updateMaintenance'])->name('updateMaintenance');
   
    // ! parts update
    Route::get('/edit-maintenance-parts/{id}/{type}', [MaintenanceController::class, 'editMaintenanceParts'])->name('editMaintenanceParts');
    Route::post('/update-maintenance-parts/{id}/{type}', [MaintenanceController::class, 'updateMaintenanceParts'])->name('updateMaintenanceParts');
   
    // ! delete
    Route::post('/delete-maintenance', [MaintenanceController::class, 'deleteMaintenance'])->name('deleteMaintenance');

     // ! print
    Route::get('/print-maintenance/{id}/{type}', [MaintenanceController::class, 'printMaintenance'])->name('printMaintenance');

       

    // * Financial
    Route::get('/financials', [FinancialController::class, 'financials'])->name('financials');
    Route::post('/add-financial', [FinancialController::class, 'addFinancial'])->name('addFinancial');
    Route::post('/update-financial', [FinancialController::class, 'updateFinancial'])->name('updateFinancial');


    // * Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

}); // :End AdminMiddleware
