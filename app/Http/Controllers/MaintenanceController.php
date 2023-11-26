<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Part;
use App\Models\MaintenanceBill;
use App\Models\MaintenanceBillPart;
use App\Models\MaintenanceQuotation;
use App\Models\MaintenanceQuotationPart;
use App\Models\Customer;
use App\Models\Elevator;



class MaintenanceController extends Controller
{
    

    public function maintenance(){

        // dependencies
        $statuses = ['مقبول', 'مرفوض', 'يفاوض', 'متردد', 'اخرى'];
        $maintenance_bills = MaintenanceBill::all();
        $maintenance_quotations = MaintenanceQuotation::all();

        $customers = Customer::all();
        $elevators = Elevator::all();

        return view('maintenance', compact('maintenance_bills', 'maintenance_quotations', 'customers', 'elevators', 'statuses'));

    } // end function



    // =======================================================================




    public function addMaintenance(Request $request) {

        // initial
        $maintenance = ($request->type == 'عرض سعر') ? new MaintenanceQuotation() : new MaintenanceBill();



        // :continue common information
        $maintenance->customer_id = $request->customer;
        $maintenance->elevator_id = $request->elevator;


        // :report inputs
        $maintenance->elevator_type = $request->elevator_type;
        $maintenance->elevator_passengers = $request->elevator_passengers;
        $maintenance->elevator_count = $request->elevator_count;
        $maintenance->elevator_opening_mechanism = $request->elevator_opening_mechanism;
        $maintenance->elevator_load = $request->elevator_load;
        $maintenance->elevator_speed = $request->elevator_speed;
        $maintenance->elevator_floors = $request->elevator_floors;
        $maintenance->elevator_doors = $request->elevator_doors;
        $maintenance->elevator_power = $request->elevator_power;
        $maintenance->elevator_operating_mechanism = $request->elevator_operating_mechanism;

        $maintenance->price = 0;
        $maintenance->status = $request->status;
        $maintenance->status_alt = ($request->status == 'اخرى') ? $request->status_alt : '';
        $maintenance->date = $request->date;
        $maintenance->reference = $request->reference;
        $maintenance->desc = $request->desc;
        $maintenance->user_id = session()->get('user_id');
        


        // :save instance
        $maintenance->save();


        // :derived information
        $id = $maintenance->id;
        $elevator_count = $maintenance->elevator_count;

        $type = ($request->type == 'عرض سعر') ? 'quotation' : 'bill';
        $parts = Part::all();
        $suppliers = Supplier::all();


        return view('add-maintenance-parts', compact('type', 'id', 'parts', 'suppliers', 'elevator_count', 'maintenance'));


    } // end function





    // =======================================================================





    public function addMaintenanceParts(Request $request){


        // :define vars
        $id = $request->id;
        $type = $request->type;


        
        // : 1- quotation parts
        if ($type == 'quotation') {


            // : reset maintenance price
            $maintenance = MaintenanceQuotation::find($id);
            $maintenance->price = 0;
            $maintenance->save();


            // : add quo-parts
            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                    
                    $part = new MaintenanceQuotationPart();
                    $part->maintenance_quotation_id = $request->id;
                    $part->part_id = $request->elevator_parts[$i];

                    $part->name = $request->part_name[$request->elevator_parts[$i]][0];

                    $part->quantity = ($request->part_quantity[$request->elevator_parts[$i]][0]) ? ($request->part_quantity[$request->elevator_parts[$i]][0]) : 0;

                    $part->price = ($request->part_price[$request->elevator_parts[$i]][0]) ? ($request->part_price[$request->elevator_parts[$i]][0]) : 0;


                    $part->save();


                    // :calc total price
                    $maintenance->price += ($part->price * $part->quantity) * $maintenance->elevator_count;
                    $maintenance->save();


                } // end loop
            } // end if





        // : add bill-parts
        } else {


            // : reset maintenance price
            $maintenance = MaintenanceBill::find($id);
            $maintenance->price = 0;
            $maintenance->save();



            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                
                    $part = new MaintenanceBillPart();
                    $part->maintenance_bill_id = $request->id;
                    $part->part_id = $request->elevator_parts[$i];

                    $part->name = $request->part_name[$request->elevator_parts[$i]][0];
                    
                    $part->quantity = ($request->part_quantity[$request->elevator_parts[$i]][0]) ? ($request->part_quantity[$request->elevator_parts[$i]][0]) : 0;

                    $part->price = ($request->part_price[$request->elevator_parts[$i]][0]) ? ($request->part_price[$request->elevator_parts[$i]][0]) : 0;



                    // :extra supplier id 
                    $part->supplier_id = $request->part_supplier[$request->elevator_parts[$i]][0];
                    $part->save();
                    

                    // :calc total price
                    $maintenance->price += ($part->price * $part->quantity) * $maintenance->elevator_count;
                    $maintenance->save();

                    
                    // :deduct the part quantity (only in bill / only if no supplier chosen)
                    if (!$part->supplier_id) {

                        $partOG = Part::find($request->elevator_parts[$i]);
                        $partOG->quantity -= ($part->quantity * $maintenance->elevator_count);
                        $partOG->save();

                    } // end if
                    


                } // end loop
            } // end if

        } // end else




        


        // :return message
        return redirect()->route('maintenance')->with('success', 'تم اضافة عرض سعر بنجاح');

    } //end function







    // =======================================================================




    public function updateMaintenance(Request $request){


        // :init
        $maintenance = null;
        $maintenanceResetLink = false;

        if ($request->type == 'عرض سعر') {
            
            $maintenance = MaintenanceQuotation::find($request->id);

            // ! check if elevator has changed
            // if ($maintenance->elevator_id != $request->elevator) 
            //     $maintenanceResetLink = 'quotation';


        } else {

            $maintenance = MaintenanceBill::find($request->id);

            // ! check if elevator has changed
            // if ($maintenance->elevator_id != $request->elevator) 
            //     $maintenanceResetLink = 'bill';


        } // end else



        // : continue with common-inputs
        $maintenance->customer_id = $request->customer;
        $maintenance->elevator_id = $request->elevator;


        // :report inputs
        $maintenance->elevator_type = $request->elevator_type;
        $maintenance->elevator_passengers = $request->elevator_passengers;
        $maintenance->elevator_count = $request->elevator_count;
        $maintenance->elevator_opening_mechanism = $request->elevator_opening_mechanism;
        $maintenance->elevator_load = $request->elevator_load;
        $maintenance->elevator_speed = $request->elevator_speed;
        $maintenance->elevator_floors = $request->elevator_floors;
        $maintenance->elevator_doors = $request->elevator_doors;
        $maintenance->elevator_power = $request->elevator_power;
        $maintenance->elevator_operating_mechanism = $request->elevator_operating_mechanism;



        // :continue with common inputs - 2
        $maintenance->date = $request->date;
        if ($maintenanceResetLink != false) $maintenance->price = 0; // ! reset price
        $maintenance->status = $request->status;
        $maintenance->status_alt = ($request->status == 'اخرى') ? $request->status_alt : '';
        $maintenance->reference = $request->reference;
        $maintenance->desc = $request->desc;
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


        // : suppliers
        $suppliers = Supplier::all();
        $partsOG = Part::all();


        return view('edit-maintenance-parts', compact('maintenance', 'partsOG', 'parts', 'partsArray', 'type', 'suppliers'));

    } // end function






    // ========================================================================






    public function updateMaintenanceParts(Request $request, $id, $type) {

        // : 1- quotation parts
        if ($type == 'quotation') {


            // : reset maintenance price
            $maintenance = MaintenanceQuotation::find($id);
            $maintenance->price = 0;
            $maintenance->save();


            // ! remove previous parts
            MaintenanceQuotationPart::where('maintenance_quotation_id', $id)->delete();

            


            // : add quo-parts
            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                    
                    $part = new MaintenanceQuotationPart();
                    $part->maintenance_quotation_id = $request->id;
                    $part->part_id = $request->elevator_parts[$i];

                    $part->name = $request->part_name[$request->elevator_parts[$i]][0];

                    $part->quantity = ($request->part_quantity[$request->elevator_parts[$i]][0]) ? ($request->part_quantity[$request->elevator_parts[$i]][0]) : 0;

                    $part->price = ($request->part_price[$request->elevator_parts[$i]][0]) ? ($request->part_price[$request->elevator_parts[$i]][0]) : 0;


                    $part->save();


                    // :calc total price
                    $maintenance->price += ($part->price * $part->quantity) * $maintenance->elevator_count;
                    $maintenance->save();

         
                } // end loop
            } // end if







        // : add bill-parts
        } else {




            // : reset maintenance price
            $maintenance = MaintenanceBill::find($id);
            $maintenance->price = 0;
            $maintenance->save();




            // ! return parts quantity to stock (if there is supplier)
            $maintenanceParts = MaintenanceBillPart::where('maintenance_bill_id', $id)->get();

            foreach ($maintenanceParts as $maintenancePart) {

                // :get part
                $partOG = Part::find($maintenancePart->part_id);

                if (!$maintenancePart->supplier_id) {

                    $partOG->quantity += ($maintenancePart->quantity * $maintenance->elevator_count);
                    $partOG->save();

                } // end if
                
            } // end loop




            // ! remove previous parts
            MaintenanceBillPart::where('maintenance_bill_id', $id)->delete();

            


            // :continue adding
            if (!empty($request->elevator_parts)) {
                for ($i = 0; $i < count($request->elevator_parts) ; $i++) { 
                
                    $part = new MaintenanceBillPart();
                    $part->maintenance_bill_id = $request->id;
                    $part->part_id = $request->elevator_parts[$i];
                    
                    $part->name = $request->part_name[$request->elevator_parts[$i]][0];
                    
                    $part->quantity = ($request->part_quantity[$request->elevator_parts[$i]][0]) ? ($request->part_quantity[$request->elevator_parts[$i]][0]) : 0;

                    $part->price = ($request->part_price[$request->elevator_parts[$i]][0]) ? ($request->part_price[$request->elevator_parts[$i]][0]) : 0;



                    // :extra supplier id 
                    $part->supplier_id = $request->part_supplier[$request->elevator_parts[$i]][0];
                    $part->save();
                    

                    // :calc total price
                    $maintenance->price += ($part->price * $part->quantity) * $maintenance->elevator_count;
                    $maintenance->save();


                    // :deduct the part quantity (only in bill / only if no supplier chosen)
                    if (!$part->supplier_id) {

                        $partOG = Part::find($request->elevator_parts[$i]);
                        $partOG->quantity -= ($part->quantity * $maintenance->elevator_count);
                        $partOG->save();

                    } // end if


                } // end loop
            } // end if

        } // end else



        // continue to main-page
        return redirect()->route('maintenance')->with('success', 'تم تعديل بيانات عملية الصيانة بنجاح');


    } // end function







    // ========================================================================





    public function deleteMaintenance(Request $request){


        // 1: bill
        if ($request->type == 'bill') {


            // :get maintenance
            $maintenance = MaintenanceBill::find($request->id);



            // ! return parts quantity to stock (if there is supplier)
            $maintenanceParts = MaintenanceBillPart::where('maintenance_bill_id', $request->id)->get();

            foreach ($maintenanceParts as $maintenancePart) {

                // :get part
                $partOG = Part::find($maintenancePart->part_id);

                if (!$maintenancePart->supplier_id) {

                    $partOG->quantity += ($maintenancePart->quantity * $maintenance->elevator_count);
                    $partOG->save();

                } // end if
                
            } // end loop




            // ! remove maintenance -> parts would be remove by relation
            MaintenanceBill::where('id', $request->id)->delete();




        // 2: quotation
        } else {

            // ! remove maintenance -> parts would be remove by relation
            MaintenanceQuotation::where('id', $request->id)->delete();
           
        } // end else



        return redirect()->route('maintenance')->with('success', 'تم  حذف عملية الصيانة بنجاح');

        
    } // end function







    // ========================================================================




    
    public function printMaintenance($id, $type){

         // :determine type / + get parts
         if ($type == 'quotation') {
            
            $type = 'عرض سعر';
            $maintenance = MaintenanceQuotation::find($id);

            // :get parts and group them by usage
            $partsArray = MaintenanceQuotationPart::where('maintenance_quotation_id', $maintenance->id)->get('part_id')->toArray();
            $parts = Part::whereIn('id' , $partsArray)->get();

        } else {

            $type = 'فاتورة';
            $maintenance = MaintenanceBill::find($id);


            // :get parts and group them by usage
            $partsArray = MaintenanceBillPart::where('maintenance_bill_id', $maintenance->id)->get('part_id')->toArray();
            $parts = Part::whereIn('id' , $partsArray)->get();

        } // end if



        
        return view('print-maintenance', compact('maintenance', 'parts', 'type'));

    } // end function

} //end controller
