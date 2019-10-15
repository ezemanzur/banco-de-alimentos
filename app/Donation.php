<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class
Donation extends Model
{

    const ESTADO_VIGENTE = 'VIGENTE';
    const ESTADO_COMPLETADO = 'COMPLETADA';
    const ESTADO_RECHAZADO = 'RACHAZADA';

    protected $fillable = [
        'id','state'
    ];

    public function products(){
        return $this->hasMany('App\Product');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
