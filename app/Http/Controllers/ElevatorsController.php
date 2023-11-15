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


class ElevatorsController extends Controller
{
    public function parts(){

        $parts = Part::all();

        return view('parts',compact('parts'));
        
    }

    public function addPart(Request $request){

        $part = new Part();

        $part->name = $request->name;
        $part->type = $request->type;
        $part->desc = $request->desc;

        if (!empty($request->file('image'))) {
            
            $image = 'part-' . time() . '.' . $request->file('image')->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('public/parts',$image);
    
            $part->image = $image;

        }
       

        $part->save();


        $price = new PartPrice();

        $price->part_id = $part->id;
        $price->purchase_price = $request->purchase_price;
        $price->sell_price = $request->sell_price;

        $price->save();

        return redirect()->back()->with('success', 'تم إضافة قطعة بنجاح');

    }

    public function addPartPrice(Request $request){


        $price = new PartPrice();

        $price->part_id = $request->id;
        $price->purchase_price = $request->purchase_price;
        $price->sell_price = $request->sell_price;

        $price->save();

        return redirect()->back()->with('success', 'تم تغيير سعر القطعة بنجاح');


    }


    public function elevators(){

        $elevators = Elevator::all();

        $elevators_parts = [];

        $parts = Part::all();

        $regions = Region::all();
        $provinces = Province::all();
        $cities = City::all();
        $neighbors = Neighbor::all();

        $nationalities = Nationality::all();

        $banks = Bank::all();

        return view('elevators', compact('elevators', 'parts', 'regions', 'provinces', 'cities', 'neighbors', 'banks', 'nationalities', 'elevators_parts'));

    }

    public function addElevator(Request $request){

        $elevator = new Elevator();

        $elevator->name = $request->name;
        $elevator->company = $request->company;


         if (!empty($request->file('image'))) {
            
            $image = 'elevator-' . time() . '.' . $request->file('image')->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('public/elevators',$image);
    
            $elevator->image = $image;

        }

        $elevator->nationality_id = $request->nationality;

        $elevator->supplier_name = $request->supplier_name;
        $elevator->supplier_phone = $request->supplier_phone;
        $elevator->supplier_email = $request->supplier_email;

        $elevator->region_id = $request->region;
        $elevator->province_id = $request->province;
        $elevator->city_id = $request->city;
        $elevator->neighbor_id = $request->neighbor;
        $elevator->bank_id = $request->bank;
        $elevator->bank_account = $request->bank_account;
        $elevator->iban = $request->iban;

        $elevator->save();

        if (!empty($request->elevator_parts)) {
           
            for ($i=0; $i < count($request->elevator_parts) ; $i++) { 
            
                $elevator_part = new ElevatorPart();
                $elevator_part->elevator_id = $elevator->id;
                $elevator_part->part_id =  $request->elevator_parts[$i];
     
                $elevator_part->save();
     
             }

        }
      

        return redirect()->back()->with('success', 'تم إضافة مصعد بنجاح');


    }


    public function updateElevator(Request $request){


        $elevator = Elevator::find($request->id);

        $elevator->name = $request->name;
        $elevator->company = $request->company;


         if (!empty($request->file('image'))) {
            
            $image = 'elevator-' . time() . '.' . $request->file('image')->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('public/elevators',$image);
    
            $elevator->image = $image;

        }

        $elevator->nationality_id = $request->nationality;

        $elevator->supplier_name = $request->supplier_name;
        $elevator->supplier_phone = $request->supplier_phone;
        $elevator->supplier_email = $request->supplier_email;

        $elevator->region_id = $request->region;
        $elevator->province_id = $request->province;
        $elevator->city_id = $request->city;
        $elevator->neighbor_id = $request->neighbor;
        $elevator->bank_id = $request->bank;
        $elevator->bank_account = $request->bank_account;
        $elevator->iban = $request->iban;

        $elevator->save();

        return redirect()->back()->with('success', 'تم تعديل المصعد بنجاح');


    }


    public function editElevatorParts($id){

        $elevator = Elevator::find($id);

        $parts = Part::all();

        $elevator_parts = [];

        foreach ($elevator->elevatorParts as $part) {
           
            $elevator_parts [] = $part->part->id;

        }


        return view('edit-elevator-parts', compact('elevator', 'elevator_parts','parts'));
    }

    public function updateElevatorParts(Request $request){

        $elevator = Elevator::find($request->id);

        //delete all the old parts
        foreach ($elevator->elevatorParts as $part) {
            
            $part->delete();

        }


        //add the new parts
        if (!empty($request->elevator_parts)) {
           
            for ($i=0; $i < count($request->elevator_parts) ; $i++) { 
            
                $elevator_part = new ElevatorPart();
                $elevator_part->elevator_id = $elevator->id;
                $elevator_part->part_id =  $request->elevator_parts[$i];
     
                $elevator_part->save();
     
             }

        }//end of if !empty($request->elevator_parts

        return redirect()->route('elevators');
    }

}
