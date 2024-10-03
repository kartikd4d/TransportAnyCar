<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded = [];

    public function quote_by_transporter()
    {
        return $this->hasOne(QuoteByTransporter::class, 'id', 'quote_by_transporter_id');
    }
}
