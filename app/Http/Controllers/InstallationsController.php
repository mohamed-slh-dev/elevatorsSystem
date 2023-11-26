<?php

namespace App\Http\Controllers;

use App\Models\Part;
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
    public function installationsBills(){

        // dependencies
        $statuses = ['مقبول', 'مرفوض', 'يفاوض', 'متردد', 'اخرى'];
        $installation_bills = InstallationBill::paginate(15);

        $customers = Customer::all();
        $elevators = Elevator::all();

        return view('installations-bills', compact('installation_bills', 'customers', 'elevators', 'statuses'));

    } // end function


    public function installationsQuotations(){

        // dependencies
        $statuses = ['مقبول', 'مرفوض', 'يفاوض', 'متردد', 'اخرى'];
        $installation_quotations = InstallationQuotation::paginate(15);

        $customers = Customer::all();
        $elevators = Elevator::all();

        return view('installations-quotations', compact('installation_quotations', 'customers', 'elevators', 'statuses'));

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
        $elevator_count = $installation->elevator_count;

        $type = ($request->type == 'عرض سعر') ? 'quotation' : 'bill';
        $parts = Part::all();
        $suppliers = Supplier::all();


        return view('add-installations-parts', compact('type', 'id', 'parts', 'suppliers', 'elevator_count', 'installation'));


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
                    $installation->price += ($part->price * $part->quantity) * $installation->elevator_count;
                    $installation->save();


                } // end loop
            } // end if





              // :return message
              return redirect()->route('installationsQuotations')->with('success', 'تم اضافة عرض سعر بنجاح');


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
                    $installation->price += ($part->price * $part->quantity) * $installation->elevator_count;
                    $installation->save();

                    
                    // :deduct the part quantity (only in bill / only if no supplier chosen)
                    if (!$part->supplier_id) {

                        $partOG = Part::find($request->elevator_parts[$i]);
                        $partOG->quantity -= ($part->quantity * $installation->elevator_count);
                        $partOG->save();

                    } // end if
                    


                } // end loop
            } // end if


              // :return message
              return redirect()->route('installationsBills')->with('success', 'تم اضافة  فاتورة بنجاح');

        } // end else

    } //end function







    // =======================================================================




    public function updateInstallation(Request $request){


        // :init
        $installation = null;
        $installationResetLink = false;

        if ($request->type == 'عرض سعر') {
            
            $installation = InstallationQuotation::find($request->id);

            // ! check if elevator has changed
            // if ($installation->elevator_id != $request->elevator) 
            //     $installationResetLink = 'quotation';


        } else {


            $installation = InstallationBill::find($request->id);

            // ! check if elevator has changed
            // if ($installation->elevator_id != $request->elevator) 
            //     $installationResetLink = 'bill';


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


            if ($request->type != 'عرض سعر') {
                
                return redirect()->route('installationsBills')->with('success', 'تم تعديل بيانات فاتورة التركيب بنجاح');
            } else {
                
                return redirect()->route('installationsQuotations')->with('success', 'تم تعديل بيانات عرض سعر التركيب بنجاح');

            }
            

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


        // : suppliers + original parts
        $suppliers = Supplier::all();
        $partsOG = Part::all();

        return view('edit-installations-parts', compact('installation', 'partsOG', 'parts', 'partsArray', 'type', 'suppliers'));

    } // end function






    // ========================================================================






    public function updateInstallationParts(Request $request, $id, $type) {

        // : 1- quotation parts
        if ($type == 'quotation') {


            // : reset installation price
            $installation = InstallationQuotation::find($id);
            $installation->price = 0;
            $installation->save();


            // ! remove previous parts
            InstallationQuotationPart::where('installation_quotation_id', $id)->delete();

            


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
                    $installation->price += ($part->price * $part->quantity) * $installation->elevator_count;
                    $installation->save();

         
                } // end loop
            } // end if






            // continue to main-page
            return redirect()->route('installationsQuotations')->with('success', 'تم تعديل بيانات عرض السعر التركيب بنجاح');


        // : add bill-parts
        } else {




            // : reset installation price
            $installation = InstallationBill::find($id);
            $installation->price = 0;
            $installation->save();




            // ! return parts quantity to stock (if there is supplier)
            $installationParts = InstallationBillPart::where('installation_bill_id', $id)->get();

            foreach ($installationParts as $installationPart) {

                // :get part
                $partOG = Part::find($installationPart->part_id);

                if (!$installationPart->supplier_id) {

                    $partOG->quantity += ($installationPart->quantity * $installation->elevator_count);
                    $partOG->save();

                } // end if
                
            } // end loop




            // ! remove previous parts
            InstallationBillPart::where('installation_bill_id', $id)->delete();

            


            // :continue adding
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
                    $installation->price += ($part->price * $part->quantity) * $installation->elevator_count;
                    $installation->save();


                    // :deduct the part quantity (only in bill / only if no supplier chosen)
                    if (!$part->supplier_id) {

                        $partOG = Part::find($request->elevator_parts[$i]);
                        $partOG->quantity -= ($part->quantity * $installation->elevator_count);
                        $partOG->save();

                    } // end if


                } // end loop
            } // end if


            // continue to main-page
        return redirect()->route('installationsBills')->with('success', 'تم تعديل بيانات فاتورة التركيب بنجاح');

        } // end else



        

    } // end function







    // ========================================================================





    public function deleteInstallation(Request $request){


        // 1: bill
        if ($request->type == 'bill') {


            // :get installation
            $installation = InstallationBill::find($request->id);



            // ! return parts quantity to stock (if there is supplier)
            $installationParts = InstallationBillPart::where('installation_bill_id', $request->id)->get();

            foreach ($installationParts as $installationPart) {

                // :get part
                $partOG = Part::find($installationPart->part_id);

                if (!$installationPart->supplier_id) {

                    $partOG->quantity += ($installationPart->quantity * $installation->elevator_count);
                    $partOG->save();

                } // end if
                
            } // end loop




            // ! remove installation -> parts would be remove by relation
            InstallationBill::where('id', $request->id)->delete();




            return redirect()->route('installationsBills')->with('success', 'تم  حذف فاتورة التركيب بنجاح');

        // 2: quotation
        } else {

            // ! remove installation -> parts would be remove by relation
            InstallationQuotation::where('id', $request->id)->delete();
           
            return redirect()->route('installationsQuotations')->with('success', 'تم  حذف عرض السعر التركيب بنجاح');

        } // end else




        
    } // end function







    // ========================================================================




    
    public function printInstallation($id, $type){

         // :determine type / + get parts
         if ($type == 'quotation') {
            
            $type = 'عرض سعر';
            $installation = InstallationQuotation::find($id);

            // :get parts and group them by usage
            $partsArray = InstallationQuotationPart::where('installation_quotation_id', $installation->id)->get('part_id')->toArray();
            $parts = Part::whereIn('id' , $partsArray)->get();

        
            return view('print-installation-quotation', compact('installation', 'parts', 'type'));


        } else {

            $type = 'فاتورة';
            $installation = InstallationBill::find($id);


            // :get parts and group them by usage
            $partsArray = InstallationBillPart::where('installation_bill_id', $installation->id)->get('part_id')->toArray();
            $parts = Part::whereIn('id' , $partsArray)->get();

        
            return view('print-installation-bill', compact('installation', 'parts', 'type'));


        } // end if


        

    } // end function



} //end controller
