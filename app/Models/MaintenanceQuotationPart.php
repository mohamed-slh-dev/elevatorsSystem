<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceQuotationPart extends Model
{
    use HasFactory;

    public function bill() {
        return $this->belongsTo('App\Models\MaintenanceQuotation');
    }

    public function part() {
        return $this->belongsTo('App\Models\Part');
    }
}
