<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnsubscribeRequest extends Model
{
    protected $fillable = [
        'user_id', 'status',
    ];

}
