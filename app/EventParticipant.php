<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
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

    public function scopeSimpleDetails($query)
    {
        return $query->select(['id','event_id','user_id'])->orderBy('id','desc');
    }

    public function scopeSessionDetails($query)
    {
        return $query->select(['id','time_taken','km_completed','avg_speed']);
    }

    public function getParticipants(){

            return $this->hasMany(User::class)->SimpleDetails();
    }
}
