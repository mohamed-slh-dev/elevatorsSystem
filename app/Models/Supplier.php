<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    public function installationBillParts() {
        return $this->hasMany('App\Models\InstallationBillPart');
    }



    public function installationBillPartsPrice() {
        return $this->installationBillParts()?->sum('price');
    }


} // end model
