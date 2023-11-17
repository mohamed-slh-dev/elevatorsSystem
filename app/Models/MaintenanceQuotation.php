<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceQuotation extends Model
{
    use HasFactory;

    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }

    public function elevator() {
        return $this->belongsTo('App\Models\Elevator');
    }


    public function maintenanceQuotationParts() {
        return $this->hasMany('App\Models\MaintenanceQuotationPart');
    }
    
}
