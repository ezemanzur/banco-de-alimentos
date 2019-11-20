<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dni', 'phone', 'rol', 'isActive', 'isAccepted'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Retorna el nombre del tipo de empleado que es
    public function getRolName() {
        switch ($this->rol) {
            case 'giver':
                return "Donante";
            case 'employee':
                return "Empleado";
        }
    }

    public static function updateUser($request, $id) {
        //Actualizo en giver
        DB::table('users')
            ->where('id', $id)
            ->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'dni' => $request['dni'],
                'phone' => $request['phone'],
            ]);
    }

    public function giver()
    {
        return $this->hasOne('App\Giver','giver_id');
    }
    public function myGiver(){
        return Giver::where('user_id', $this->id)->first();
    }
    public function donations(){
        return $this->hasMany('App\Donation');
    }

}
