<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeContract;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Neighbor;
use App\Models\Bank;
use App\Models\Nationality;
use App\Models\JobTitle;





class EmployeesController extends Controller
{
    public function employees(){

        $employees = Employee::paginate(15);

        $regions = Region::all();
        $provinces = Province::all();
        $cities = City::all();
        $neighbors = Neighbor::all();

        $nationalities = Nationality::all();

        $banks = Bank::all();

        $jobs = JobTitle::all();


        return view('employees', compact('employees','regions', 'provinces', 'cities', 'neighbors', 'banks', 'nationalities', 'jobs'));


    }

    public function addEmployee(Request $request){

        $employee = new Employee();

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->identity_type = $request->identity_type;
        $employee->identity_number = $request->identity_number;
        $employee->nationality_id = $request->nationality;
        $employee->phone = $request->phone;
        $employee->birthdate = $request->birthdate;
        $employee->region_id = $request->region;
        $employee->province_id = $request->province;
        $employee->city_id = $request->city;
        $employee->neighbor_id = $request->neighbor;
        $employee->bank_id = $request->bank;
        $employee->bank_account = $request->bank_account;
        $employee->iban = $request->iban;

        $employee->save();

        $contract = new EmployeeContract();

        $contract->employee_id = $employee->id;

        $contract->date = $request->date;
        $contract->end_date = $request->end_date;
        $contract->salary = $request->salary;
        $contract->status = $request->status;
        $contract->reference = $request->reference;
        $contract->job_title_id = $request->title;

        $contract->save();

        return redirect()->back()->with('success','تم إضافة موظف بنجاح');

    }



    public function updateEmployee(Request $request){

        $employee = Employee::find($request->id);

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->identity_type = $request->identity_type;
        $employee->identity_number = $request->identity_number;
        $employee->nationality_id = $request->nationality;
        $employee->phone = $request->phone;
        $employee->birthdate = $request->birthdate;
        $employee->region_id = $request->region;
        $employee->province_id = $request->province;
        $employee->city_id = $request->city;
        $employee->neighbor_id = $request->neighbor;
        $employee->bank_id = $request->bank;
        $employee->bank_account = $request->bank_account;
        $employee->iban = $request->iban;

        $employee->save();

       

        return redirect()->back()->with('success','تم تعديل موظف بنجاح');

    }

    public function employeeContracts($id){

        $employee = Employee::find($id);

        $jobs = JobTitle::all();

        return view('employee-contracts', compact('employee','jobs'));

    }


    public function addEmployeeContract(Request $request){

        $contract = new EmployeeContract();

        $contract->employee_id = $request->id;

        $contract->date = $request->date;
        $contract->end_date = $request->end_date;
        $contract->salary = $request->salary;
        $contract->status = $request->status;
        $contract->reference = $request->reference;
        $contract->job_title_id = $request->title;

        $contract->save();

        return redirect()->back()->with('success','تم إضافة عقد للموظف بنجاح');

        
    }


    public function deleteEmployeeContract(Request $request){

        $contract = EmployeeContract::find($request->id);

        $contract->delete();

        return redirect()->back()->with('warning','تم حذف عقد الموظف بنجاح');

    }
}
