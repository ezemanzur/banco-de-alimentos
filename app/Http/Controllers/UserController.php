<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Giver;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Hash;
use App\Http\Controllers\GiverController;
use App;
use Session;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile() {
        $user = auth()->user();
        $giver = DB::table('givers')->where('user_id', $user->id)->get();
        $neighborhoods = DB::table('neighborhoods')->get();
        $requests = DB::table('unsubscribe_requests')->where('user_id', '=', $user->id)->get();
        return view('user/profile', [
            'user' => $user,
            'giver' => $giver,
            'requests' => $requests,
            'neighborhoods' => $neighborhoods,
        ]);
    }

    public function changePassword(Request $request) {
        
        $code = 5;
        session(['codigo' => $code]);
        
        //Valida los campos que recibe
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required',
            'repeat_new' => 'required'
        ]);

        //Obtengo usuario
        $id = auth()->user()->id;
        $user = DB::table('users')->where('id', $id)->get();

        //Contraseña erronea
        if (!(Hash::check($request->password, $user->first()->password))) {
            return redirect()->back()->with('error', 'Contraseña actual inválida');
        }
        //Contraseñas no coinciden
        else if ($request->new_password <> $request->repeat_new) {
            return redirect()->back()->with('error', 'Las nuevas contraseñas no coinciden');
        }
        //No hay problemas y la cambia
        else {
            $new_password = Hash::make($request->new_password);
            
            DB::table('users')
                ->where('id', $id)
                ->update(['password' => $new_password]);
            return redirect()->back()->with('success', 'La contraseña se ha cambiado con éxito');
        }   
    }

    //Update giver profile
    public function changeGiverProfile(Request $request){
        
        $code = 4;
        session(['codigo' => $code]);

        //Verifico campos de formulario
        $this->validate($request, [
            'company_name' => ['required', 'string', 'max:255'],
            'company-cuit' => 'required',
            'company-phone' => 'required',
            'address-street' => 'required',
            'address-number' => 'required',
            'neighborhood' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dni' => ['required', 'integer'],
            'phone' => 'required',
        ]);

        //Obtengo usuario y donante
        $id = auth()->user()->id;
        $user = DB::table('users')->where('id', $id)->get();
        $giver = DB::table('givers')->where('user_id', $id)->get();


        $exist_company_name = DB::table('givers')
            ->where([
                ['giver_id', '<>' ,$giver[0]->giver_id],
                ['company_name', '=', $request->company_name],
            ])
            ->count();
        $exist_email = DB::table('users')
            ->where([
                ['id', '<>' ,$user[0]->id],
                ['email', '=', $request->email],
            ])
            ->count();

        //Chequeo errores de existencia de datos
        if ($exist_company_name > 0){
            return redirect()->back()->with('error', 'El nombre de la empresa que ingresaste ya está siendo utilizado.');
        }
        if ($exist_email > 0){
            return redirect()->back()->with('error', 'El email que ingresaste ya está siendo utilizado.');
        }

        //Actualizo en user
        User::updateUser($request, $user->first()->id);
        
        //Actualizo en giver
        Giver::updateGiver($request, $giver->first()->giver_id);

        return redirect()->back()->with('success', 'Los datos se han modificado con éxito');
    }

    public function unsubscribeRequest(){

        $id = auth()->user()->id;
        DB::table('unsubscribe_requests')->insert(
            ['user_id' => $id, 'status' => 1]
        );

        return redirect()->back()->with('success', 'Has solicitado la baja con éxito');
    }

    
}
