<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class GiverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //Redirección
        if (Auth::user()->rol === 'giver'){
            return view('/donante');
        }
        else {
            return view('/home');
        }
    }
}
