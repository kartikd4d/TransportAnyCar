<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFreind extends Model
{
    protected $guarded = [];

    public function user_recivever(){
        return $this->belongsTo(User::class,'receiver_id','id');
    }

    public function user_sender(){
        return $this->belongsTo(User::class,'sender','id');
    }

}
