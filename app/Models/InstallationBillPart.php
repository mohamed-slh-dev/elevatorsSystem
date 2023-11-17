<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallationBillPart extends Model
{
    use HasFactory;

    public function installationBill() {
        return $this->belongsTo('App\Models\InstallationBill');
    }

    public function part() {
        return $this->belongsTo('App\Models\Part');
    }


}
