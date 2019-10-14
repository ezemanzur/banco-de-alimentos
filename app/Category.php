<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'id', 'name', 
    ];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
