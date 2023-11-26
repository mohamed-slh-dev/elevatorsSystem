<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Neighbor;
use App\Models\Bank;
use App\Models\Nationality;

class CustomersController extends Controller
{
    public function customers () {

        $customers = Customer::paginate(15);

        $regions = Region::all();
        $provinces = Province::all();
        $cities = City::all();
        $neighbors = Neighbor::all();

        $nationalities = Nationality::all();

        $banks = Bank::all();



        return view('customers', compact('customers','regions', 'provinces', 'cities', 'neighbors', 'banks', 'nationalities'));

    }


    public function addCustomer(Request $request){

        $customer = new customer();


        if (!empty($request->file('image'))) {
            
            $image = 'customer-' . time() . '.' . $request->file('image')->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('public/customers',$image);
    
            $customer->image = $image;

        }

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->type = $request->type;
        $customer->email = $request->email;


        $customer->identity_type = $request->identity_type;
        $customer->identity_number = $request->identity_number;
        $customer->nationality_id = $request->nationality;
        $customer->phone = $request->phone;
        $customer->region_id = $request->region;
        $customer->province_id = $request->province;
        $customer->city_id = $request->city;
        $customer->neighbor_id = $request->neighbor;
        $customer->bank_id = $request->bank;
        $customer->bank_account = $request->bank_account;
        $customer->iban = $request->iban;

        $customer->save();

        return redirect()->back()->with('success', 'تم إضافة عميل بنجاح');

    }

    public function updateCustomer(Request $request){


        $customer = Customer::find($request->id);


        if (!empty($request->file('image'))) {
            
            $image = 'customer-' . time() . '.' . $request->file('image')->getClientOriginalExtension();

            $path = $request->file('image')->storeAs('public/customers',$image);
    
            $customer->image = $image;

        }

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->type = $request->type;
        $customer->email = $request->email;

        $customer->identity_type = $request->identity_type;
        $customer->identity_number = $request->identity_number;
        $customer->nationality_id = $request->nationality;
        $customer->phone = $request->phone;
        $customer->region_id = $request->region;
        $customer->province_id = $request->province;
        $customer->city_id = $request->city;
        $customer->neighbor_id = $request->neighbor;
        $customer->bank_id = $request->bank;
        $customer->bank_account = $request->bank_account;
        $customer->iban = $request->iban;

        $customer->save();

        return redirect()->back()->with('success', 'تم تعديل عميل بنجاح');

    }
}
