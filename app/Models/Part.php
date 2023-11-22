<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    public function nationality()
    {
        return $this->belongsTo('App\Models\Nationality');
    }

    
    public function partPrices()
    {
        return $this->hasMany('App\Models\PartPrice');
    }

    public function elevatorParts()
    {
        return $this->hasMany('App\Models\ElevatorPart');
    }


    public function installationBillParts()
    {
        return $this->hasMany('App\Models\InstallationBillPart');
    }

    public function installationQuotationParts()
    {
        return $this->hasMany('App\Models\InstallationQuotationPart');
    }


    public function maintenanceBillParts()
    {
        return $this->hasMany('App\Models\MaintenanceBillPart');
    }

    public function maintenanceQuotationParts()
    {
        return $this->hasMany('App\Models\MaintenanceQuotationPart');
    }

   


}
