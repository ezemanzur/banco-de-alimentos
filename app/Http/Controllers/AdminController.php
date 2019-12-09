<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //Redirección
        if (Auth::user()->isAdmin){
            //Employee
            $employees = DB::table('users')->where('rol', '=', 'employee')->get();
            //Voluntario
            $new_volunteers = DB::table('users')->where([
                    ['rol', '=', 'volunteer'],
                    ['isAccepted', '=', NULL],
                ])->get();
            //Voluntario aceptados
            $volunteers = DB::table('users')->where([
                ['rol', '=', 'volunteer'],
                ['isAccepted', '=', '1'],
            ])->get();
            //Employee
            $admins = DB::table('users')->where('isAdmin', '=', '1')->get();

            return view('user/admin', [
                'employees' => $employees,
                'volunteers' => $volunteers,
                'new_volunteers' => $new_volunteers,
                'admins' => $admins,
            ]);
        }
        else {
            return view('/home');
        }
    }

    public function acceptVolunteer($id) {
        $code = 1;
        session(['codigo' => $code]);
        if (Auth::user()->isAdmin){
            DB::table('users')
                ->where('id', $id)
                ->update(['isAccepted' => 1]);
            
            return redirect()->back()->with('success', 'Voluntario aceptado');
        }
        else{
            return view('/home');
        }
    }

    public function rejectVolunteer($id) {
        $code = 0;
        session(['codigo' => $code]);
        if (Auth::user()->isAdmin){
            DB::table('users')
                ->where('id', $id)
                ->delete();
        
            return redirect()->back()->with('success', 'Voluntario rechazado');
        }
        else{
            return view('/home');
        }
    }

    public function employeeToAdmin($id) {
        $code = 3;
        session(['codigo' => $code]);
        if (Auth::user()->isAdmin){
            DB::table('users')
                ->where('id', $id)
                ->update(['isAdmin' => 1]);
            
            return redirect()->back()->with('success', 'El usuario ahora es administrador del sitio');
        }
        else{
            return view('/home');
        }
    }
    
    public function adminToEmployee($id) {
        $code = 2;
        session(['codigo' => $code]);
        if (Auth::user()->isAdmin){
            DB::table('users')
                ->where('id', $id)
                ->update(['isAdmin' => 0]);
            
            return redirect()->back()->with('success', 'El usuario ya no es más administrador del sitio');
        }
        else{
            return view('/home');
        }
    }

    public function deleteUser($id) {
        $code = 2;
        session(['codigo' => $code]);
        if (Auth::user()->isAdmin){
            DB::table('users')
                ->where('id', $id)
                ->delete();
            
            return redirect()->back()->with('success', 'El empleado se ha eliminado del sitio');
        }
        else{
            return view('/home');
        }
    }
    
    public function createEmployee(Request $data) {
        $code = 4;
        session(['codigo' => $code]);

        if (Auth::user()->isAdmin){
            $this->validate($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'confirmed'],
                'dni' => ['required'],
                'phone' => ['required'],
            ]);

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'dni' => $data['dni'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'rol' => 'employee'
            ]);

            return redirect()->back()->with('success', 'Cargase un nuevo empleado al sitio con exito!');
        }
        else{
            return view('/home');
        }
    }

}
