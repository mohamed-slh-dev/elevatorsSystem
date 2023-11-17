<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstallationBill;
use App\Models\InstallationBillPart;
use App\Models\InstallationQuotation;
use App\Models\InstallationQuotationPart;
use App\Models\Customer;
use App\Models\Elevator;



class InstallationsController extends Controller
{
    public function installations(){

        $installation_bills = InstallationBill::all();
        $installation_quotations = InstallationQuotation::all();

        $customers = Customer::all();
        $elevators = Elevator::all();

        return view('installations', compact('installation_bills', 'installation_quotations', 'customers', 'elevators'));

    }


    public function addInstallation(Request $request){


        if ($request->type == 'عرض سعر') {
            
            $installation_quotation = new InstallationQuotation();

            $installation_quotation->customer_id = $request->customer;
            $installation_quotation->elevator_id = $request->elevator;
            $installation_quotation->price = 0;
            $installation_quotation->date = $request->date;
            $installation_quotation->reference = $request->reference;
            $installation_quotation->user_id = session()->get('user_id');

            $installation_quotation->save();

            //data to send to next stage (add parts)
            $type = 'quotation';
            $id = $installation_quotation->id;
            $elevator = Elevator::find($request->elevator);

            return view('add-installations-parts', compact('type', 'id', 'elevator'));

        }else{

            $installation_bill = new InstallationBill();

            $installation_bill->customer_id = $request->customer;
            $installation_bill->elevator_id = $request->elevator;
            $installation_bill->price = 0;
            $installation_bill->date = $request->date;
            $installation_bill->reference = $request->reference;
            $installation_bill->user_id = session()->get('user_id');

            $installation_bill->save();

            //data to send to next stage (add parts)
            $type = 'bill';
            $id = $installation_bill->id;
            $elevator = Elevator::find($request->elevator);

            return view('add-installations-parts', compact('type', 'id', 'elevator'));

        }
    }


    public function addInstallationParts(Request $request){

        if ($request->type == 'quotation') {
            

            if (!empty($request->elevator_parts)) {
           
                for ($i=0; $i < count($request->elevator_parts) ; $i++) { 
                
                    $quotation_part = new InstallationQuotationPart();
                    $quotation_part->installation_quotation_id = $request->id;
                    $quotation_part->part_id = $request->elevator_parts[$i];
                    $quotation_part->price = $request->part_price[$request->elevator_parts[$i]][0];

                    $quotation = InstallationQuotation::find($request->id);
                    $quotation->price += $request->part_price[$request->elevator_parts[$i]][0];
                    $quotation->save();

                    $quotation_part->save();

                   
         
                 }
    
            }

        }else{

            if (!empty($request->elevator_parts)) {
           
                for ($i=0; $i < count($request->elevator_parts) ; $i++) { 
                
                    $bill_part = new InstallationBillPart();
                    $bill_part->installation_bill_id = $request->id;
                    $bill_part->part_id = $request->elevator_parts[$i];
                    $bill_part->price = $request->part_price[$request->elevator_parts[$i]][0];

                    $bill = InstallationBill::find($request->id);
                    $bill->price += $request->part_price[$request->elevator_parts[$i]][0];
                    $bill->save();

                    $bill_part->save();
         
                 }
    
            }

        }

        return redirect()->route('installations')->with('تم اضافة عرض سعر بنجاح');


    }
}
