<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Product;
use Egulias\EmailValidator\Exception\DotAtEnd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use User;
use Carbon\Carbon;

class DonationController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function end()
    {
        DB::table('donations')
            ->where([
                ['user_id', '=' , Auth::user()->id],
                ['status', '=', 'CREANDO'],
            ])
            ->update(['status' => 'FINALIZANDO']);
        return redirect()->back();
    }
    
    public function save(Request $request)
    {
        //Validar datos de entrada
        $this->validate($request, [
            'date-between1' => 'required',
            'date-between2' => 'required',
            'hour-between1' => 'required',
            'hour-between2' => 'required',
        ]);

        DB::table('donations')
            ->where([
                ['user_id', '=' , Auth::user()->id],
                ['status', '=', 'FINALIZANDO'],
            ])
            ->update([
                'status' => 'VIGENTE',
                'date_from' => $request['date-between1'],
                'date_to' => $request['date-between2'],
                'time_from' => $request['hour-between1'],
                'time_to' => $request['hour-between2'],
            ]);

        return redirect()->back()->with(['success' => 'Has creado una nueva donación con éxito.']);
    }

    public function delete()
    {
        //Obtengo donación creando
        $donacion = DB::table('donations')->where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'CREANDO'],
        ])->get();
        //Elimino productos
        if (count($donacion) > 0) {
            DB::table('products')->where('donation_id', '=' , $donacion[0]->donation_id)->delete();
            //Elimino donación
            DB::table('donations')->where('donation_id', '=' , $donacion[0]->donation_id)->delete();
            //Donacion finalizando
        }
        
        //Obtengo donación finalizando
        $donacion = DB::table('donations')->where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'FINALIZANDO'],
        ])->get();

        if (count($donacion) > 0) {
            //Elimino productos
            DB::table('products')->where('donation_id', '=' , $donacion[0]->donation_id)->delete();
            //Elimino donación
            DB::table('donations')->where('donation_id', '=' , $donacion[0]->donation_id)->delete();
        }
        
        return redirect()->back()->with(['success' => 'Has cancelado la donación con éxito.']);
    }

}
