<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallationQuotation extends Model
{
    use HasFactory;

    public function employee() {
        return $this->belongsTo('App\Models\Employee');
    }

    public function elevator() {
        return $this->belongsTo('App\Models\Elevator');
    }
    
}
