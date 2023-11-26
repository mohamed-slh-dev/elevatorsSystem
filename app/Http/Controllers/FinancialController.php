<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\FinancialTransaction;
use App\Models\Supplier;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    


    public function financials() {

        // :get finances
        $financials = FinancialTransaction::paginate(15);

        // :get dependencies
        $employees = Employee::all();
        $suppliers = Supplier::all();

        return view("financials", compact('financials', 'employees', 'suppliers'));

    } // end function



    // =============================================





    public function addFinancial (Request $request){

        $financial = new FinancialTransaction();


        $financial->type = $request->type; // HR / Maintenance / Installation


        if ($request->type == 'الموارد البشرية') {

            $financial->employee_id = !empty($request->employee) ? $request->employee : null;
            $financial->type_desc = !empty($request->type_desc) ? $request->type_desc : null ;
            $financial->amount_in_days = !empty($request->amount_in_days) ? $request->amount_in_days : null ;

            // : get employee data
            $employee = Employee::find($request->employee);

            $financial->amount = doubleval($employee->contracts->sortByDesc('created_at')->first()->salary / 30) * $request->amount_in_days;;

        // :amount differ
        } else {

            $financial->supplier_id = !empty($request->supplier) ? $request->supplier : null;
            $financial->amount = $request->amount;

        } //end else



        $financial->user_id = session('user_id');
        
        $financial->payment_with = $request->payment_with;
        $financial->payment_type = $request->payment_type;
        $financial->note = $request->note;
        $financial->date = $request->date;
        $financial->reference = $request->reference;
        $financial->remaining_amount = 0; // default remaining

        if ($request->payment_type == 'تقصيد المبلغ')
            $financial->remaining_amount = $request->remaining_amount;


        $financial->save();


        return redirect()->back()->with('success','تم إضافة الاجراء المالي بنجاح');

    } // end function





    // =============================================







    public function updateFinancial (Request $request){

        $financial = FinancialTransaction::find($request->id);

        $financial->type = $request->type; // HR / Maintenance / Installation

        // ! reset essentials
        $financial->employee_id = null;
        $financial->supplier_id = null;
        $financial->type_desc = null;
        $financial->amount_in_days = null;
        $financial->amount = 0;


        if ($request->type == 'الموارد البشرية') {

            $financial->employee_id = !empty($request->employee) ? $request->employee : null;
            $financial->type_desc = !empty($request->type_desc) ? $request->type_desc : null ;
            $financial->amount_in_days = !empty($request->amount_in_days) ? $request->amount_in_days : null ;

            // : get employee data
            $employee = Employee::find($request->employee);

            $financial->amount = doubleval($employee->contracts->sortByDesc('created_at')->first()->salary / 30) * $request->amount_in_days;


        // :amount differ
        } else {

            $financial->supplier_id = !empty($request->supplier) ? $request->supplier : null;
            $financial->amount = $request->amount;

        } //end else



        $financial->user_id = session('user_id');
        
        $financial->payment_with = $request->payment_with;
        $financial->payment_type = $request->payment_type;
        $financial->note = $request->note;
        $financial->date = $request->date;
        $financial->reference = $request->reference;
        $financial->remaining_amount = 0; // default remaining

        if ($request->payment_type == 'تقصيد المبلغ')
            $financial->remaining_amount = $request->remaining_amount;
                


        $financial->save();


        return redirect()->back()->with('success','تم تعديل الاجراء المالي بنجاح');

    } // end function


} // end controller
