<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

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
