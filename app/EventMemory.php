<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventMemory extends Model
{
    protected $guarded = [];

    public function getMemoryImagePathAttribute($val)
    {
        return get_asset($val, false, get_constants('default.user_image'));
    }

    public function scopeSimpleDetails($query)
    {
        return $query->select(['id','memory_image_path']);
    }
}
