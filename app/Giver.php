<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giver extends Model
{
    protected $fillable = [
        'giver_id', 'user_id', 'company-name', 'company-cuit', 'company-phone', 'address-street', 'address-number', 'address-floor', 'address-apartment',
    ];
}
