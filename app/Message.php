<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', 'id')->withTrashed();
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id')->withTrashed();
    }
}
