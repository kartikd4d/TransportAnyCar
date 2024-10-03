<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function quote()
    {
        return $this->hasOne(UserQuote::class,'id','user_quote_id');
    }
}
