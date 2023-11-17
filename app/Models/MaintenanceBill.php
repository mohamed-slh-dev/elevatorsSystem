<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceBill extends Model
{
    use HasFactory;

    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }
    
    public function elevator() {
        return $this->belongsTo('App\Models\Elevator');
    }


    public function maintenanceBillParts() {
        return $this->belongsTo('App\Models\MainteneceBillPart');
    }

    
}
