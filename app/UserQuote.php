<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuote extends Model
{
     protected $table = "user_quotes";
    protected $guarded = [];

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function watchlists()
{
    return $this->hasMany(Watchlist::class, 'user_quote_id'); // Adjust the foreign key if necessary
}
public function getDistanceAttribute($value)
{
    return (float) filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

    public function quoteByTransporter()
    {
        return $this->hasOne(QuoteByTransporter::class);
    }

    public function quotationDetail()
    {
        return $this->hasOne(QuotationDetail::class, 'user_quote_id');
    }

    public function getImageAttribute($val)
    {
        return checkCarFileExist($val);
    }

    public function getMapImageAttribute($val)
    {
        return checkFileExist($val);
    }
}
