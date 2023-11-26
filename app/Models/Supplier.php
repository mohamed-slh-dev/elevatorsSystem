<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    


    public function transactions() {
        return $this->hasMany('App\Models\FinancialTransaction');
    }


    public function transactionsTotal() {
        return $this->transactions()->sum('amount');
    }



    // ---------------------------------------------

    

    public function installationBillParts() {
        return $this->hasMany('App\Models\InstallationBillPart');
    }


    public function installationBillPartsPrice() {
        return $this->installationBillParts()->sum('price');
    }



    // ---------------------------------------------

    

    public function maintenanceBillParts() {
        return $this->hasMany('App\Models\InstallationBillPart');
    }


    public function maintenanceBillPartsPrice() {
        return $this->maintenanceBillParts()->sum('price');
    }



} // end model
