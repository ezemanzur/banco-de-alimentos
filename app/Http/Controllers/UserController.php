<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Hash;


class UserController extends Controller
{
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
}
