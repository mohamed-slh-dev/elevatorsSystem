<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Elevator;
use App\Models\InstallationBill;
use App\Models\InstallationQuotation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        // :dependencies
        $customers = Customer::all();
        $elevators = Elevator::all();

        $installationBills = InstallationBill::all();
        $installationQuotations = InstallationQuotation::all();

        return view('dashboard', compact('customers','elevators','installationBills','installationQuotations'));

    } // end function

} // end controller
