<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_id', 'name', 'amount', 'has_exp_date', 'exp_date', 'category_id', 'type_id', 'donation_id', 'need_refrigeration'
    ];
}
