<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function provinces()
    {
        return $this->hasMany('App\Models\Province');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }


    public function neighbors()
    {
        return $this->hasMany('App\Models\Neighbor');
    }

    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    public function elevators()
    {
        return $this->hasMany('App\Models\Elevator');
    }

   
}
