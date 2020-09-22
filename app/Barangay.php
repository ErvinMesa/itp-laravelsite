<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $guarded = [];
    protected $table = 'barangay';
    
    public function citymun()
    {
        return $this->belongsTo(CityMun::class,'idcm');
    }
}
