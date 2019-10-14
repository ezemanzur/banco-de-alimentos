<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'expiration_date',
    ];

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    public function donation(){
        return $this->belongsTo('App\Donation','donation_id');
    }
}
