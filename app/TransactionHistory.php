<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    protected $table = "transaction_history";
    protected $guarded = [];

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function quote()
    {
        return $this->belongsTo(UserQuote::class, 'user_quote_id', 'id');
    }
}
