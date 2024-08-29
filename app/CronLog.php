<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CronLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'cron_name',
        'status',
        'error_message',
    ];
}
