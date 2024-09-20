<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emailtemplate extends Model
{
    use HasFactory;
     protected $fillable = ['subject','body'];
}
