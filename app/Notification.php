<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'from_user_id',
        'title',
        'message',
        'seen',
        'type'
    ];

    public function userFrom()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function userTo()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Accessor to get the first 50 characters of full_message_html
    public function getShortMessageAttribute()
    {
        return strlen($this->full_message_html) > 50
            ? substr($this->full_message_html, 0, 50) . '...'
            : $this->full_message_html;
    }

    // Accessor to format the created_at timestamp
    public function getFormattedCreatedAtAttribute()
    {
        $now = Carbon::now();
        $created = Carbon::parse($this->created_at);

        if ($created->diffInSeconds($now) < 60) {
            return 'Just now';
        } elseif ($created->isToday()) {
            return 'Today';
        } elseif ($created->isYesterday()) {
            return 'Yesterday';
        } else {
            return $created->format('M d, Y');
        }
    }
}
