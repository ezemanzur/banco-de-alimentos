<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;
use Auth;
use App\Neighborhood;
use App\Giver;
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
        if (Auth::user()->rol == 'giver'){
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

            return view('user/donante', [
                'giver' => $giver,
                'categories' => $categories,
                'types' => $types,
                'requests' => $requests,
                'neighborhoods' => $neighborhoods,
                'donations' => $donations,
                'products' => $products,
                'allproducts' => $allproducts,
                'status' => $status
            ]);
        }
        else {
            return view('/home');
        }
    }
}
