<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }


    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function neighbor()
    {
        return $this->belongsTo('App\Models\Neighbor');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Models\Nationality');
    }


    public function bank()
    {
        return $this->belongsTo('App\Models\Bank');
    }

}
