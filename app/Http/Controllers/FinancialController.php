<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\FinancialTransaction;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    


    public function financials() {

        // :get financials
        $financials = FinancialTransaction::all();

        // :get dependencies
        $employees = Employee::all();


        return view("financials", compact('financials', 'employees'));

    } // end function



    // =============================================





    public function addFinancial (Request $request){

        $financial = new FinancialTransaction();


        $financial->type = $request->type; // HR / Maintenance / Installation

        if ($request->type == 'الموارد البشرية') {

            $financial->employee_id = !empty($request->employee) ? $request->employee : null;
            $financial->type_desc = !empty($request->employee) ? $request->type_desc : null ;
            $financial->amount_in_days = !empty($request->employee) ? $request->amountInDays : null ;
            
        } // end if



        $financial->amount = $request->amount;
        $financial->user_id = session('user_id');
        
        $financial->payment_with = $request->payment_with;
        $financial->payment_type = $request->payment_type;
        $financial->note = $request->note;
        $financial->date = $request->date;
        $financial->reference = $request->reference;

        $financial->save();


        return redirect()->back()->with('success','تم إضافة الاجراء المالي بنجاح');

    } // end function





    // =============================================




} // end controller
