<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller {



    public function suppliers(){

        $suppliers = Supplier::paginate(15);

        return view('suppliers',compact('suppliers'));

    } // end function






    // ---------------------------------------------------------------------------------





    public function addSupplier(Request $request) {

        $supplier = new Supplier();

        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;

        $supplier->save();

        return redirect()->back()->with('success', 'تم إضافة المورد بنجاح');
        
    } //end function







    // ---------------------------------------------------------------------------------




    public function updateSupplier(Request $request) {

        $supplier = Supplier::find($request->id);

        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;

        $supplier->save();


        return redirect()->back()->with('success','تم تعديل بيانات المورد بنجاح');

    } // end function




} // end controller
