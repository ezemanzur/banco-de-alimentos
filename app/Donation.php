<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class
Donation extends Model
{
    protected $fillable = [
        'id'
    ];

    public function products(){
        return $this->hasMany('App\Product');
    }
    public function giver(){
        return $this->belongsTo('App\Giver','giver_id');
    }
}
