<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    //
    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function scopeSimpleDetails($query)
    {
        return $query->select(['id','event_id','is_default','event_image_path'])->orderBy('is_default','desc');
    }

    public function getEventImagePathAttribute($val)
    {
        return get_asset($val, false, get_constants('default.user_image'));
    }
}
