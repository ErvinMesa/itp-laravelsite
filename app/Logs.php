<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $guarded = [];

    public function scanned_user(){
        return $this->belongsTo(User::class,'scanned_user_id');
    }
    public function scanning_user(){
        return $this->belongsTo(User::class,'scanning_user_id');
    }
}
