<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityMun extends Model
{
    protected $guarded = [];
    protected $table = 'citymun';
    public $timestamps = false;
    
    public function barangay()
    {
        return $this->hasMany(Profile::class);
    }
}
