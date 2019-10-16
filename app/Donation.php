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

    protected $fillable = [
        'donation_id', 'user_id', 'status', 'date_from', 'date_to', 'time_from', 'time_to',
    ];
}
