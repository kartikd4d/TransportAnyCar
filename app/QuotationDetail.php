<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    protected $table = "quotation_details";
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function userQuote()
    {
        return $this->hasOne(UserQuote::class, 'id', 'user_quote_id');
    }
}
