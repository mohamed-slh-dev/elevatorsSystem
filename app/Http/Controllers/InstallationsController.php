<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
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

        // dependencies
        $statuses = ['مقبول', 'مرفوض', 'يفاوض', 'متردد', 'اخرى'];
        $installation_bills = InstallationBill::all();
        $installation_quotations = InstallationQuotation::all();

        $customers = Customer::all();
        $elevators = Elevator::all();

        return view('installations', compact('installation_bills', 'installation_quotations', 'customers', 'elevators', 'statuses'));

    } // end function



    // =======================================================================




    public function addInstallation(Request $request) {

        // initial
        $installation = ($request->type == 'عرض سعر') ? new InstallationQuotation() : new InstallationBill();



        // :continue common information
        $installation->customer_id = $request->customer;
        $installation->elevator_id = $request->elevator;


        // :report inputs
        $installation->elevator_type = $request->elevator_type;
        $installation->elevator_passengers = $request->elevator_passengers;
        $installation->elevator_count = $request->elevator_count;
        $installation->elevator_opening_mechanism = $request->elevator_opening_mechanism;
        $installation->elevator_load = $request->elevator_load;
        $installation->elevator_speed = $request->elevator_speed;
        $installation->elevator_floors = $request->elevator_floors;
        $installation->elevator_doors = $request->elevator_doors;
        $installation->elevator_power = $request->elevator_power;
        $installation->elevator_operating_mechanism = $request->elevator_operating_mechanism;

        $installation->price = 0;
        $installation->status = $request->status;
        $installation->status_alt = ($request->status == 'اخرى') ? $request->status_alt : '';
        $installation->date = $request->date;
        $installation->reference = $request->reference;
        $installation->desc = $request->desc;
        $installation->user_id = session()->get('user_id');
        


        // :save instance
        $installation->save();


        // :derived information
        $id = $installation->id;
        $type = ($request->type == 'عرض سعر') ? 'quotation' : 'bill';
        $elevator = Elevator::find($request->elevator);
        $suppliers = Supplier::all();

        return view('add-installations-parts', compact('type', 'id', 'elevator', 'suppliers'));


    } // end function





    // =======================================================================





    public function addInstallationParts(Request $request){


        // :define vars
        $id = $request->id;
        $type = $request->type;


        
        // : 1- quotation parts
        if ($type == 'quotation') {


            // : reset installation price
            $installation = InstallationQuotation::find($id);
            $installation->price = 0;
            $installation->save();


            // : add quo-parts
            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                    
                    $part = new InstallationQuotationPart();
                    $part->installation_quotation_id = $request->id;
                    $part->part_id = $request->elevator_parts[$i];

                    $part->name = $request->part_name[$request->elevator_parts[$i]][0];

                    $part->quantity = ($request->part_quantity[$request->elevator_parts[$i]][0]) ? ($request->part_quantity[$request->elevator_parts[$i]][0]) : 0;

                    $part->price = ($request->part_price[$request->elevator_parts[$i]][0]) ? ($request->part_price[$request->elevator_parts[$i]][0]) : 0;


                    $part->save();


                    // :calc total price
                    $installation->price += $part->price * $part->quantity;
                    $installation->save();

         
                } // end loop
            } // end if





        // : add bill-parts
        } else {


            // : reset installation price
            $installation = InstallationBill::find($id);
            $installation->price = 0;
            $installation->save();



            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                
                    $part = new InstallationBillPart();
                    $part->installation_bill_id = $request->id;
                    $part->part_id = $request->elevator_parts[$i];

                    $part->name = $request->part_name[$request->elevator_parts[$i]][0];
                    
                    $part->quantity = ($request->part_quantity[$request->elevator_parts[$i]][0]) ? ($request->part_quantity[$request->elevator_parts[$i]][0]) : 0;

                    $part->price = ($request->part_price[$request->elevator_parts[$i]][0]) ? ($request->part_price[$request->elevator_parts[$i]][0]) : 0;



                    // :extra supplier id 
                    $part->supplier_id = $request->part_supplier[$request->elevator_parts[$i]][0];
                    $part->save();
                    

                    // :calc total price
                    $installation->price += $part->price * $part->quantity;
                    $installation->save();

         
                } // end loop
            } // end if

        } // end else




        


        // :return message
        return redirect()->route('installations')->with('success', 'تم اضافة عرض سعر بنجاح');

    } //end function







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


        // :report inputs
        $installation->elevator_type = $request->elevator_type;
        $installation->elevator_passengers = $request->elevator_passengers;
        $installation->elevator_count = $request->elevator_count;
        $installation->elevator_opening_mechanism = $request->elevator_opening_mechanism;
        $installation->elevator_load = $request->elevator_load;
        $installation->elevator_speed = $request->elevator_speed;
        $installation->elevator_floors = $request->elevator_floors;
        $installation->elevator_doors = $request->elevator_doors;
        $installation->elevator_power = $request->elevator_power;
        $installation->elevator_operating_mechanism = $request->elevator_operating_mechanism;



        // :continue with common inputs - 2
        $installation->date = $request->date;
        if ($installationResetLink != false) $installation->price = 0; // ! reset price
        $installation->status = $request->status;
        $installation->status_alt = ($request->status == 'اخرى') ? $request->status_alt : '';
        $installation->reference = $request->reference;
        $installation->desc = $request->desc;
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


        // : suppliers
        $suppliers = Supplier::all();


        return view('edit-installations-parts', compact('installation', 'parts', 'partsArray', 'type', 'suppliers'));

    } // end function






    // ========================================================================






    public function updateInstallationParts(Request $request, $id, $type) {

        // : 1- quotation parts
        if ($type == 'quotation') {

            // ! remove previous parts
            InstallationQuotationPart::where('installation_quotation_id', $id)->delete();

            // : reset installation price
            $installation = InstallationQuotation::find($id);
            $installation->price = 0;
            $installation->save();


            // : add quo-parts
            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                    
                    $part = new InstallationQuotationPart();
                    $part->installation_quotation_id = $request->id;
                    $part->part_id = $request->elevator_parts[$i];

                    $part->name = $request->part_name[$request->elevator_parts[$i]][0];

                    $part->quantity = ($request->part_quantity[$request->elevator_parts[$i]][0]) ? ($request->part_quantity[$request->elevator_parts[$i]][0]) : 0;

                    $part->price = ($request->part_price[$request->elevator_parts[$i]][0]) ? ($request->part_price[$request->elevator_parts[$i]][0]) : 0;


                    $part->save();


                    // :calc total price
                    $installation->price += $part->price * $part->quantity;
                    $installation->save();

         
                } // end loop
            } // end if



        // : add bill-parts
        } else {


            // ! remove previous parts
            InstallationBillPart::where('installation_bill_id', $id)->delete();

            // : reset installation price
            $installation = InstallationBill::find($id);
            $installation->price = 0;
            $installation->save();



            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                
                    $part = new InstallationBillPart();
                    $part->installation_bill_id = $request->id;
                    $part->part_id = $request->elevator_parts[$i];
                    
                    $part->name = $request->part_name[$request->elevator_parts[$i]][0];
                    
                    $part->quantity = ($request->part_quantity[$request->elevator_parts[$i]][0]) ? ($request->part_quantity[$request->elevator_parts[$i]][0]) : 0;

                    $part->price = ($request->part_price[$request->elevator_parts[$i]][0]) ? ($request->part_price[$request->elevator_parts[$i]][0]) : 0;



                    // :extra supplier id 
                    $part->supplier_id = $request->part_supplier[$request->elevator_parts[$i]][0];
                    $part->save();
                    

                    // :calc total price
                    $installation->price += $part->price * $part->quantity;
                    $installation->save();

         
                } // end loop
            } // end if

        } // end else



        // continue to main-page
        return redirect()->route('installations')->with('success', 'تم تعديل بيانات عملية التركيب بنجاح');


    } // end function







    // ========================================================================





    public function deleteInstallation(Request $request){

        if ($request->type == 'bill') {
            
            $installation = InstallationBill::find($request->id);

            foreach ($installation->installationBillParts as $part) {
                
                $part->delete();

            }


            $installation->delete();

        } else {

             $installation = InstallationQuotation::find($request->id);

            foreach ($installation->installationQuotationParts as $part) {
                
                $part->delete();

            }


            $installation->delete();
           
        }

        return redirect()->route('installations')->with('success', 'تم  حذف عملية التركيب بنجاح');

        
        
    }







    // ========================================================================




    
    public function printInstallation($id, $type){

         // : determine type / + get parts
         if ($type == 'quotation') {
            
            $type = 'عرض سعر';
            $installation = InstallationQuotation::find($id);
            $parts = InstallationQuotationPart::where('installation_quotation_id', $installation->id)->get();
           
        } else {

            $type = 'فاتورة';
            $installation = InstallationBill::find($id);
            $parts = InstallationBillPart::where('installation_bill_id', $installation->id)->get();

        } // end if

        return view('print-installation', compact('installation', 'parts', 'type'));

    }//end of printInstallation



} //end controller
