<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallationQuotationPart extends Model
{
    use HasFactory;

    public function installationQuotation() {
        return $this->belongsTo('App\Models\InstallationQuotation');
    }

    public function part() {
        return $this->belongsTo('App\Models\Part');
    }

}
