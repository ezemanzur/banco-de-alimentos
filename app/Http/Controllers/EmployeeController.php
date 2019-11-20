<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Donation;
use App\Giver;
use App\Neighborhood;
use App\User;
use phpDocumentor\Reflection\Types\Null_;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($panel = null, $list = true, $detail = false, $current_donation = null)
    {

        if ($panel)
            session(['codigo' => $panel]);
        if($current_donation)
            $current_donation = Donation::where('donation_id', $current_donation)->first();

        if (Auth::user()->rol === 'employee') {
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
            $donations = Donation::all();
            //Donantes
            $givers = User::all()->where('rol', 'giver')->filter(function ($user, $key) {
                return is_null($user->isAccepted);
            });

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
                'givers' => $givers,
                'listDonations' => $list,
                'resumeDonation' => $detail,
                'current_donation' => $current_donation
            ]);
        } else {
            return view('/home');
        }
    }

    public function acceptGiver($id)
    {
        session(['codigo' => 2]);
        $user = User::find($id);
        $user->update(['isAccepted' => true, 'isActive' => true]);
        return redirect()->back()->with(['success' => "Se acepto al donante: " . $user->giver->company_name]);
    }

    public function refuseGiver($id)
    {
        session(['codigo' => 2]);
        $user = User::find($id);
        $user->update(['isAccepted' => false, 'isActive' => true]);
        return redirect()->back()->with(['success' => "Se rechazo al donante: " . $user->giver->company_name]);
    }

}
