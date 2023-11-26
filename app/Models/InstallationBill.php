<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallationBill extends Model
{
    use HasFactory;


    public function user() {
        return $this->belongsTo('App\Models\User');
    }


    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }

    public function elevator() {
        return $this->belongsTo('App\Models\Elevator');
    }


    public function installationBillParts() {
        return $this->hasMany('App\Models\InstallationBillPart');
    }


    public function installationBillPartsPrice() {

        $installationParts = $this->installationBillParts()->get();
        $totalPrice = 0;

        foreach ($installationParts as $installationPart) {

            $totalPrice += $installationPart->price * $installationPart->quantity;

        } // end loop

        return $totalPrice;

    } // end function


} // end model
