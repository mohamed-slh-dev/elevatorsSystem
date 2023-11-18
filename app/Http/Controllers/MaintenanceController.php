<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceBill;
use App\Models\MaintenanceBillPart;
use App\Models\MaintenanceQuotation;
use App\Models\MaintenanceQuotationPart;
use App\Models\Customer;
use App\Models\Elevator;



class MaintenanceController extends Controller
{
    public function maintenance(){

        $maintenance_bills = MaintenanceBill::all();
        $maintenance_quotations = MaintenanceQuotation::all();

        $customers = Customer::all();
        $elevators = Elevator::all();

        return view('maintenance', compact('maintenance_bills', 'maintenance_quotations', 'customers', 'elevators'));

    } // end function



    // =======================================================================




    public function addMaintenance(Request $request){


        if ($request->type == 'عرض سعر') {
            
            $maintenance_quotation = new MaintenanceQuotation();

            $maintenance_quotation->customer_id = $request->customer;
            $maintenance_quotation->elevator_id = $request->elevator;
            $maintenance_quotation->price = 0;
            $maintenance_quotation->date = $request->date;
            $maintenance_quotation->reference = $request->reference;
            $maintenance_quotation->user_id = session()->get('user_id');

            $maintenance_quotation->save();

            //data to send to next stage (add parts)
            $type = 'quotation';
            $id = $maintenance_quotation->id;
            $elevator = Elevator::find($request->elevator);

            return view('add-maintenance-parts', compact('type', 'id', 'elevator'));

        } else {

            $maintenance_bill = new MaintenanceBill();

            $maintenance_bill->customer_id = $request->customer;
            $maintenance_bill->elevator_id = $request->elevator;
            $maintenance_bill->price = 0;
            $maintenance_bill->date = $request->date;
            $maintenance_bill->reference = $request->reference;
            $maintenance_bill->user_id = session()->get('user_id');

            $maintenance_bill->save();

            //data to send to next stage (add parts)
            $type = 'bill';
            $id = $maintenance_bill->id;
            $elevator = Elevator::find($request->elevator);

            return view('add-maintenance-parts', compact('type', 'id', 'elevator'));

        } // end else

    } // end function





    // =======================================================================





    public function addMaintenanceParts(Request $request){


        
        if ($request->type == 'quotation') {
            
            if (!empty($request->elevator_parts)) {
           
                for ($i=0; $i < count($request->elevator_parts) ; $i++) { 
                
                    $quotation_part = new MaintenanceQuotationPart();
                    $quotation_part->maintenance_quotation_id = $request->id;
                    $quotation_part->part_id = $request->elevator_parts[$i];
                    $quotation_part->price = $request->part_price[$request->elevator_parts[$i]][0];

                    $quotation = MaintenanceQuotation::find($request->id);
                    $quotation->price += $request->part_price[$request->elevator_parts[$i]][0];
                    $quotation->save();

                    $quotation_part->save();
                }
            }

        }else{

            if (!empty($request->elevator_parts)) {
           
                for ($i=0; $i < count($request->elevator_parts) ; $i++) { 
                
                    $bill_part = new MaintenanceBillPart();
                    $bill_part->maintenance_bill_id = $request->id;
                    $bill_part->part_id = $request->elevator_parts[$i];
                    $bill_part->price = $request->part_price[$request->elevator_parts[$i]][0];

                    $bill = MaintenanceBill::find($request->id);
                    $bill->price += $request->part_price[$request->elevator_parts[$i]][0];
                    $bill->save();

                    $bill_part->save();
         
                 }
    
            }

        }

        return redirect()->route('maintenance')->with('success', 'تم اضافة عرض سعر بنجاح');


    }







    // =======================================================================




    public function updateMaintenance(Request $request){


        // :init
        $maintenance = null;
        $maintenanceResetLink = false;

        if ($request->type == 'عرض سعر') {
            
            $maintenance = MaintenanceQuotation::find($request->id);

            // ! check if elevator has changed
            if ($maintenance->elevator_id != $request->elevator) 
                $maintenanceResetLink = 'quotation';


        } else {

            $maintenance = MaintenanceBill::find($request->id);

            // ! check if elevator has changed
            if ($maintenance->elevator_id != $request->elevator) 
                $maintenanceResetLink = 'bill';


        } // end else



        // : continue with common-inputs

        $maintenance->customer_id = $request->customer;
        $maintenance->elevator_id = $request->elevator;
        $maintenance->date = $request->date;
        if ($maintenanceResetLink != false) $maintenance->price = 0; // ! reset price
        $maintenance->reference = $request->reference;
        $maintenance->user_id = session()->get('user_id');

        $maintenance->save();



        // : redirect to parts if it got a reset
        if ($maintenanceResetLink == 'quotation') {


            // ! remove previous parts
            MaintenanceQuotationPart::where('maintenance_quotation_id', $maintenance->id)->delete();

            // : redirect to edit parts - page
            return redirect()->route('editMaintenanceParts', [$maintenance->id, 'quotation']);


        } elseif ($maintenanceResetLink == 'bill') {


            // ! remove previous parts
            MaintenanceBillPart::where('maintenance_bill_id', $maintenance->id)->delete();

            // : redirect to edit parts - page
            return redirect()->route('editMaintenanceParts', [$maintenance->id, 'bill']);


        // : redirect to previous page
        } else {

            return redirect()->route('maintenance')->with('success', 'تم تعديل بيانات عملية الصيانة بنجاح');

        } // end else


    } // end function






    // ========================================================================




    public function editMaintenanceParts(Request $request, $id, $type) {


        // : init
        $maintenance = null;
        $parts = [];

        // : determine type / + get parts
        if ($type == 'quotation') {
            
            $maintenance = MaintenanceQuotation::find($id);
            $parts = MaintenanceQuotationPart::where('maintenance_quotation_id', $maintenance->id)->get();


        } else {

            $maintenance = MaintenanceBill::find($id);
            $parts = MaintenanceBillPart::where('maintenance_bill_id', $maintenance->id)->get();

        } // end if



        // : convert to array (for conditioning)
        $partsArray = $parts->pluck('part_id')->toArray();

        return view('edit-maintenance-parts', compact('maintenance', 'parts', 'partsArray', 'type'));

    } // end function






    // ========================================================================






    public function updateMaintenanceParts(Request $request, $id, $type) {

        // : 1- quotation parts
        if ($type == 'quotation') {

            // ! remove previous parts
            MaintenanceQuotationPart::where('maintenance_quotation_id', $id)->delete();

            // : reset maintenance price
            $quotation = MaintenanceQuotation::find($id);
            $quotation->price = 0;
            $quotation->save();


            // : add quo-parts
            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                    
                    $quotation_part = new MaintenanceQuotationPart();
                    $quotation_part->maintenance_quotation_id = $request->id;
                    $quotation_part->part_id = $request->elevator_parts[$i];
                    $quotation_part->price = $request->part_price[$request->elevator_parts[$i]][0];

                    $quotation->price += $request->part_price[$request->elevator_parts[$i]][0];
                    $quotation->save();

                    $quotation_part->save();
         
                } // end loop
            } // end if



        // : add bill-parts
        } else {


            // ! remove previous parts
            MaintenanceBillPart::where('maintenance_bill_id', $id)->delete();

            // : reset maintenance price
            $bill = MaintenanceBill::find($id);
            $bill->price = 0;
            $bill->save();



            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                
                    $bill_part = new MaintenanceBillPart();
                    $bill_part->maintenance_bill_id = $request->id;
                    $bill_part->part_id = $request->elevator_parts[$i];
                    $bill_part->price = $request->part_price[$request->elevator_parts[$i]][0];

                    $bill->price += $request->part_price[$request->elevator_parts[$i]][0];
                    $bill->save();

                    $bill_part->save();
         
                } // end loop
            } // end if

        } // end else



        // continue to main-page
        return redirect()->route('maintenance')->with('success', 'تم تعديل بيانات عملية الصيانة بنجاح');


    } // end function



    public function deleteMaintenance(Request $request){

        if ($request->type == 'bill') {
            
            $installation = MaintenanceBill::find($request->id);

            foreach ($installation->maintenanceBillParts as $part) {
                
                $part->delete();

            }


            $installation->delete();

        } else {

             $installation = MaintenanceQuotation::find($request->id);

            foreach ($installation->maintenanceQuotationParts as $part) {
                
                $part->delete();

            }


            $installation->delete();
           
        }

        return redirect()->route('maintenance')->with('success', 'تم  حذف عملية الصيانة بنجاح');

        
        
    }

} //end controller
