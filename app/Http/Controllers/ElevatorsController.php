<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;
use App\Models\PartPrice;
use App\Models\Elevator;
use App\Models\ElevatorPart;

use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Neighbor;
use App\Models\Bank;
use App\Models\Nationality;


class ElevatorsController extends Controller {


    public function parts() {

        // dependencies
        $parts = Part::paginate(15);
        $nationalities = Nationality::all();
        $usages = ['ماكينة', 'دلائل التعليق والتثبيت', 'الكابينة', 'الأبواب و لوحات الطلب و أجهزة الطوارئ', 'البرج و حفرة المصعد'];


        return view('parts',compact('parts', 'nationalities', 'usages'));
        
    } // end controller



    // =============================================



    

    public function addPart(Request $request){

        $part = new Part();

        $part->name = $request->name;
        $part->type = $request->type;
        $part->desc = $request->desc;
        $part->usage = $request->usage;
        $part->quantity = $request->quantity;
        $part->consumed_quantity = 0; // default value
        $part->nationality_id = $request->nationality;

        if (!empty($request->file('image'))) {
            
            $image = 'part-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public/parts',$image);
    
            $part->image = $image;

        } // end if
       


        // :save instance
        $part->save();



        // :create price
        $price = new PartPrice();

        $price->part_id = $part->id;
        $price->purchase_price = $request->purchase_price;
        $price->sell_price = $request->sell_price;

        $price->save();

        return redirect()->back()->with('success', 'تم إضافة قطعة بنجاح');

    } // end function


    


    // =============================================






    public function updatePart(Request $request){

        $part = Part::find($request->id);

        $part->name = $request->name;
        $part->type = $request->type;
        $part->desc = $request->desc;
        $part->usage = $request->usage;
        $part->quantity = $request->quantity;
        $part->nationality_id = $request->nationality;

        
        if (!empty($request->file('image'))) {
            
            $image = 'part-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public/parts',$image);
    
            $part->image = $image;

        } // end if


        // :save instance
        $part->save();
        
        return redirect()->back()->with('success', 'تم تعديل القطعة بنجاح');
       

    } // end function






    // =============================================





    public function addPartPrice(Request $request){

        $price = new PartPrice();

        $price->part_id = $request->id;
        $price->purchase_price = $request->purchase_price;
        $price->sell_price = $request->sell_price;

        $price->save();

        return redirect()->back()->with('success', 'تم تغيير سعر القطعة بنجاح');


    } // end function






    // =============================================





    public function elevators() {

        // dependencies
        $elevators = Elevator::paginate(15);
        $elevators_parts = [];

        $parts = Part::all();

        return view('elevators', compact('elevators', 'elevators_parts', 'parts'));

    } // end function





    // =============================================
    




    public function addElevator(Request $request) {

        $elevator = new Elevator();

        $elevator->name = $request->name;

         if (!empty($request->file('image'))) {
            
            $image = 'elevator-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public/elevators',$image);
    
            $elevator->image = $image;

        } // end if


        
        // :save instance
        $elevator->save();




        // :add parts if available
        if (!empty($request->elevator_parts)) {
           
            for ($i=0; $i < count($request->elevator_parts) ; $i++) { 
            
                $elevator_part = new ElevatorPart();
                $elevator_part->elevator_id = $elevator->id;
                $elevator_part->part_id =  $request->elevator_parts[$i];
     
                $elevator_part->save();
     
             } // end loop

        } // end if
      

        return redirect()->back()->with('success', 'تم إضافة مصعد بنجاح');

    } // end function






    // =============================================







    public function updateElevator(Request $request){

        $elevator = Elevator::find($request->id);

        $elevator->name = $request->name;

         if (!empty($request->file('image'))) {
            
            $image = 'elevator-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('public/elevators',$image);
    
            $elevator->image = $image;

        } // end if



        // :save instance
        $elevator->save();

        return redirect()->back()->with('success', 'تم تعديل المصعد بنجاح');


    } // end function







    // =============================================






    public function editElevatorParts($id) {

        // :get elevator / selected parts
        $elevator = Elevator::find($id);
        $elevator_parts = [];

        foreach ($elevator->elevatorParts as $part) {
           
            $elevator_parts [] = $part->part->id;

        } // end loop


        // dependencies
        $parts = Part::all();


        return view('edit-elevator-parts', compact('elevator', 'elevator_parts','parts'));
        
    } // end function





    // =============================================






    public function updateElevatorParts(Request $request) {

        $elevator = Elevator::find($request->id);

        // :delete all the old parts
        foreach ($elevator->elevatorParts as $part) {
            
            $part->delete();

        } // end loop




        // :add the new parts
        if (!empty($request->elevator_parts)) {
           
            for ($i=0; $i < count($request->elevator_parts) ; $i++) { 
            
                $elevator_part = new ElevatorPart();
                $elevator_part->elevator_id = $elevator->id;
                $elevator_part->part_id =  $request->elevator_parts[$i];
     
                $elevator_part->save();
     
             } // end loop

        } // :end if

        return redirect()->route('elevators');


    } // end function

} // end controller
