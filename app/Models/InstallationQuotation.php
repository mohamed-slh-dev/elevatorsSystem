<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallationQuotation extends Model
{
    use HasFactory;

    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }
    
    public function elevator() {
        return $this->belongsTo('App\Models\Elevator');
    }


    public function installationQuotationParts() {
        return $this->hasMany('App\Models\InstallationQuotationPart');
    }
    
}
