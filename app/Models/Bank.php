<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }

    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }


    public function elevators()
    {
        return $this->hasMany('App\Models\Elevator');
    }

}
