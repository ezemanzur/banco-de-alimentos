<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giver extends Model
{
    protected $fillable = [
        'giver_id', 'user_id', 'company_name', 'company_cuit', 'company_phone', 'address_street', 'address_number', 'address_floor', 'address_apartment', 'neighborhood_id',
    ];
}
