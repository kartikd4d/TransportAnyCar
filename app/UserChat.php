<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChat extends Model
{
    protected $guarded = [];

    public function getFilePathAttribute($val)
    {
        return get_asset($val, false, get_constants('default.user_image'));
    }

    public function sender(){
        return $this->belongsTo(User::class,'sender_id','id');
    }

    public function reciever(){
        return $this->belongsTo(User::class,'receiver_id','id');
    }

    public function getCreatedAtAttribute($val){
        return date("Y-m-d H:i:s",strtotime($val));
    }
}
