<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantInfo extends Model
{
    protected $guarded = [];

    public function merchant()
    {
        return $this->belongsTo(User::class)->where('type', 'merchant');
    }
}
