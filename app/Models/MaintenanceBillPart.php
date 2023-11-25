<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceBillPart extends Model
{
    use HasFactory;

    public function maintenanceBill() {
        return $this->belongsTo('App\Models\MaintenanceBill');
    }

    public function part() {
        return $this->belongsTo('App\Models\Part');
    }

    public function supplier() {
        return $this->belongsTo('App\Models\Supplier');
    }


}
