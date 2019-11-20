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
                ['user_id', '=', Auth::user()->id],
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
                ['user_id', '=', Auth::user()->id],
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

    public function back()
    {
        //Obtengo donación creando
        $donacion = DB::table('donations')->where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'FINALIZANDO'],
        ])
            ->update(['status' => 'CREANDO']);

        return redirect()->back();
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
            DB::table('products')->where('donation_id', '=', $donacion[0]->donation_id)->delete();
            //Elimino donación
            DB::table('donations')->where('donation_id', '=', $donacion[0]->donation_id)->delete();
            //Donacion finalizando
        }

        //Obtengo donación finalizando
        $donacion = DB::table('donations')->where([
            ['user_id', '=', Auth::user()->id],
            ['status', '=', 'FINALIZANDO'],
        ])->get();

        if (count($donacion) > 0) {
            //Elimino productos
            DB::table('products')->where('donation_id', '=', $donacion[0]->donation_id)->delete();
            //Elimino donación
            DB::table('donations')->where('donation_id', '=', $donacion[0]->donation_id)->delete();
        }

        return redirect()->back()->with(['success' => 'Has cancelado la donación con éxito.']);
    }

    public function retirement_date(Request $request)
    {
        $this->validate($request, [
            'retirement_date' => 'required',
            'retirement_time' => 'required',
            'responsible_for_retirement' => 'required',
        ]);
        DB::table('donations')
            ->where([
                    ['donation_id', '=', $request->donation_id]]
            )
            ->update([
                'status' => Donation::ESTADO_ACEPTADO,
                'retirement_date' => $request['retirement_date'],
                'retirement_time' => $request['retirement_time'],
                'responsible_for_retirement' => $request['responsible_for_retirement'],
            ]);
        session(['codigo' => 1]);
        return redirect()->route('empleado')->with(['success' => "La donación ha sido aceptada correctamente"]);

    }

    public function refuse(Request $request){
        $this->validate($request, [
            'reason' => 'required',
        ]);
        DB::table('donations')
            ->where([
                    ['donation_id', '=', $request->donation_id]]
            )
            ->update([
                'status' => Donation::ESTADO_RECHAZADO,
                'reason' => $request['reason'],
            ]);
        session(['codigo' => 1]);
        return redirect()->route('empleado')->with(['success' => "La donación ha sido rechazada correctamente"]);
    }

    public function completed($donation_id){

        DB::table('donations')
            ->where([
                    ['donation_id', '=', $donation_id]]
            )
            ->update([
                'status' => Donation::ESTADO_COMPLETADO,

            ]);
        session(['codigo' => 0]);
        return redirect()->route('empleado')->with(['success' => "La donación ha sido completada"]);
    }
}
