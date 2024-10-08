<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventParticipantTracking extends Model
{
    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->SimpleDetails()->where('type', 'user')->where('status','active');
    }
}
