<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Giver extends Model
{
    protected $fillable = [
        'giver_id', 'user_id', 'company_name', 'company_cuit', 'company_phone', 'address_street', 'address_number', 'address_floor', 'address_apartment', 'neighborhood_id',
    ];

    public static function updateGiver($request, $id) {
        //Actualizo en giver
        DB::table('givers')
            ->where('giver_id', $id)
            ->update([
                'company_name' => $request['company_name'],
                'company_cuit' => $request['company-cuit'],
                'company_phone' => $request['company-phone'],
                'address_street' => $request['address-street'],
                'address_number' => $request['address-number'],
                'neighborhood_id' => $request['neighborhood'],
            ]);
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
