<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Donation;
use App\Giver;
use App\Neighborhood;
use App\User;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //Redirección
        if (Auth::user()->rol === 'employee'){
            //Donante
            $giver = DB::table('givers')->where('user_id', Auth::user()->id)->get();
            //Barrios
            $neighborhoods = DB::table('neighborhoods')->get();
            //Categorías
            $categories = DB::table('product_categories')->get();
            //Tipos
            $types = DB::table('product_types')->get();
            //Request
            $requests = DB::table('unsubscribe_requests')->where('user_id', '=', Auth::user()->id)->get();
            //Donaciones
            $donations= Donation::all()->where('user_id', Auth::user()->id);
            //Donantes
            $givers = User::all()->where('isActive','0')->where('rol','giver');
            //Donación actual
            $products = DB::table('products')
                ->join('donations', 'products.donation_id', '=', 'donations.donation_id')
                ->where([
                    ['donations.status', '=', 'CREANDO'],
                    ['donations.user_id', '=', Auth::user()->id]
                ])
                ->get();

            $allproducts = DB::table('products')
                ->join('donations', 'products.donation_id', '=', 'donations.donation_id')
                ->where('donations.user_id', '=', Auth::user()->id)
                ->get();
            $status = 'panelA';
            if (count($products) == 0) {
                $products = DB::table('products')
                    ->join('donations', 'products.donation_id', '=', 'donations.donation_id')
                    ->where('donations.status', '=', 'FINALIZANDO')
                    ->get();
                if (count($products) > 0) {
                    $status = 'panelB';
                }
            }

            return view('user/empleado', [
                'giver' => $giver,
                'categories' => $categories,
                'types' => $types,
                'requests' => $requests,
                'neighborhoods' => $neighborhoods,
                'donations' => $donations,
                'products' => $products,
                'allproducts' => $allproducts,
                'status' => $status,
                'givers' => $givers
            ]);
        }
        else {
            return view('/home');
        }
    }
}
