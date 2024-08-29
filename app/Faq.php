<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
        protected $guarded = [];

        public function scopeAdminSearch($query, $search)
        {
                $query->Where('title', 'like', "%$search%")
                    ->orWhere('content', 'like', "%$search%");
        }
}
