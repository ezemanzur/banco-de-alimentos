<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Neighborhood;
use App\User;
use DB;

class GiverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //Redirección
        if (Auth::user()->rol === 'giver'){
            $user = auth()->user();
            $giver = DB::table('givers')
                ->where('user_id', $user->id)
                ->get();
            //$neighborhoods = Neighborhood::all();
            $neighborhoods = DB::table('neighborhoods')
                ->get();
            return view('donante', ['user' => $user, 'giver' => $giver, 'neighborhoods' => $neighborhoods]);
        }
        else {
            return view('/home');
        }
    }
}
