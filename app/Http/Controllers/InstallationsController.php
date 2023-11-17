<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstallationBill;
use App\Models\InstallationBillPart;
use App\Models\InstallationQuotation;
use App\Models\InstallationQuotationPart;


class InstallationsController extends Controller
{
    public function installations(){

        $installation_bills = InstallationBill::all();
        $installation_quotations = InstallationQuotation::all();

        return view('installations', compact('installation_bills', 'installation_quotations'));

    }
}
