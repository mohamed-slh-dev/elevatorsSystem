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

    } // end function



    // =======================================================================




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

        } else {

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

        } // end else

    } // end function





    // =======================================================================





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

        return redirect()->route('installations')->with('success', 'تم اضافة عرض سعر بنجاح');


    }







    // =======================================================================




    public function updateInstallation(Request $request){


        // :init
        $installation = null;
        $installationResetLink = false;

        if ($request->type == 'عرض سعر') {
            
            $installation = InstallationQuotation::find($request->id);

            // ! check if elevator has changed
            if ($installation->elevator_id != $request->elevator) 
                $installationResetLink = 'quotation';


        } else {

            $installation = InstallationBill::find($request->id);

            // ! check if elevator has changed
            if ($installation->elevator_id != $request->elevator) 
                $installationResetLink = 'bill';


        } // end else



        // : continue with common-inputs

        $installation->customer_id = $request->customer;
        $installation->elevator_id = $request->elevator;
        $installation->date = $request->date;
        if ($installationResetLink != false) $installation->price = 0; // ! reset price
        $installation->reference = $request->reference;
        $installation->user_id = session()->get('user_id');

        $installation->save();



        // : redirect to parts if it got a reset
        if ($installationResetLink == 'quotation') {


            // ! remove previous parts
            InstallationQuotationPart::where('installation_quotation_id', $installation->id)->delete();

            // : redirect to edit parts - page
            return redirect()->route('editInstallationParts', [$installation->id, 'quotation']);


        } elseif ($installationResetLink == 'bill') {


            // ! remove previous parts
            InstallationBillPart::where('installation_bill_id', $installation->id)->delete();

            // : redirect to edit parts - page
            return redirect()->route('editInstallationParts', [$installation->id, 'bill']);


        // : redirect to previous page
        } else {

            return redirect()->route('installations')->with('success', 'تم تعديل بيانات عملية التركيب بنجاح');

        } // end else


    } // end function






    // ========================================================================




    public function editInstallationParts(Request $request, $id, $type) {


        // : init
        $installation = null;
        $parts = [];

        // : determine type / + get parts
        if ($type == 'quotation') {
            
            $installation = InstallationQuotation::find($id);
            $parts = InstallationQuotationPart::where('installation_quotation_id', $installation->id)->get();


        } else {

            $installation = InstallationBill::find($id);
            $parts = InstallationBillPart::where('installation_bill_id', $installation->id)->get();

        } // end if



        // : convert to array (for conditioning)
        $partsArray = $parts->pluck('part_id')->toArray();

        return view('edit-installations-parts', compact('installation', 'parts', 'partsArray', 'type'));

    } // end function






    // ========================================================================






    public function updateInstallationParts(Request $request, $id, $type) {

        // : 1- quotation parts
        if ($type == 'quotation') {

            // ! remove previous parts
            InstallationQuotationPart::where('installation_quotation_id', $id)->delete();

            // : reset installation price
            $quotation = InstallationQuotation::find($id);
            $quotation->price = 0;
            $quotation->save();


            // : add quo-parts
            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                    
                    $quotation_part = new InstallationQuotationPart();
                    $quotation_part->installation_quotation_id = $request->id;
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
            InstallationBillPart::where('installation_bill_id', $id)->delete();

            // : reset installation price
            $bill = InstallationBill::find($id);
            $bill->price = 0;
            $bill->save();



            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                
                    $bill_part = new InstallationBillPart();
                    $bill_part->installation_bill_id = $request->id;
                    $bill_part->part_id = $request->elevator_parts[$i];
                    $bill_part->price = $request->part_price[$request->elevator_parts[$i]][0];

                    $bill->price += $request->part_price[$request->elevator_parts[$i]][0];
                    $bill->save();

                    $bill_part->save();
         
                } // end loop
            } // end if

        } // end else



        // continue to main-page
        return redirect()->route('installations')->with('success', 'تم تعديل بيانات عملية التركيب بنجاح');


    } // end function


    public function deleteInstallation($id, $type){

        if ($type == 'bill') {
            
            $installation = InstallationBill::find($id);

            foreach ($installation->installationBillParts as $part) {
                
                $part->delete();

            }


            $installation->delete();

        } else {

             $installation = InstallationQuotation::find($id);

            foreach ($installation->installationQuotationParts as $part) {
                
                $part->delete();

            }


            $installation->delete();
           
        }

        return redirect()->route('installations')->with('success', 'تم  حذف عملية التركيب بنجاح');

        
        
    }

} //end controller
