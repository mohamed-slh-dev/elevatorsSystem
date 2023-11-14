<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    public function partPrices()
    {
        return $this->hasMany('App\Models\PartPrice');
    }

    public function elevatorParts()
    {
        return $this->hasMany('App\Models\ElevatorPart');
    }
}
