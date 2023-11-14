<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElevatorPart extends Model
{
    use HasFactory;

    public function part()
    {
        return $this->belongsTo('App\Models\Part');
    }

    public function elevator()
    {
        return $this->belongsTo('App\Models\Elevator');
    }
}
