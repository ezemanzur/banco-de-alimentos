<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    const ESTADO_CREANDO = 'CREANDO'; //0
    const ESTADO_FINALIZANDO = 'FINALIZANDO'; //1
    const ESTADO_VIGENTE = 'VIGENTE'; //2
    const ESTADO_COMPLETADO = 'COMPLETADA'; //3
    const ESTADO_RECHAZADO = 'RACHAZADA'; //4
    const ESTADO_ACEPTADO = 'ACEPTADA'; //5
    protected $fillable = [
        'donation_id', 'user_id', 'status', 'date_from', 'date_to', 'time_from', 'time_to',
    ];

    public function myUser(){
        return User::find($this->user_id);
    }

    public function nearestExpiration(){
        return Product::where('donation_id', $this->donation_id)->orderBy('exp_date', 'desc')->first();
    }
    public function products(){
        return Product::where('donation_id', $this->donation_id)->get();
    }
}
