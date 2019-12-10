<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use User;
use App\Product;
use App\Donation;
use Carbon\Carbon;
use Datetime;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request)
    {
        //Guardar producto
        function saveProduct($info, $id)
        {
            /*$product = new product();
            $product->name = $info['product-title'];
            $product->amount = $info['amount'];
            if ($info['exp_date'] != "") {
                $product->has_exp_date = 1;
                $product->exp_date = ['exp_date']; //$info['exp_date'];
            }
            else {
                $product->has_exp_date = 0;
                $product->exp_date = $date;
            }
            $product->category_id = $info['product-category'];
            $product->type_id = $info['product-type'];
            $product->donation_id = $id;
            $product->save();*/
            if ($info['exp_date'] != "") {
                $has_exp_date = 1;
                $exp_date = $info['exp_date'];
            }
            else {
                $has_exp_date = 0;
                $exp_date = NULL;
            }
            DB::table('products')->insert([[
                'name' => $info['product-title'],
                'amount' => $info['amount'],
                'has_exp_date' => $has_exp_date,
                'exp_date' => $exp_date,
                'category_id' => $info['product-category'],
                'type_id' => $info['product-type'],
                'donation_id' => $id,
                'need_refrigeration' => isset($info['need_refrigeration'])
                ]]);
        }

        //Obtener donación actual
        function getActualDonation() {
            $actual = DB::table('donations')
                ->where([
                    ['user_id', '=' , Auth::user()->id],
                    ['status', '=', 'CREANDO'],
                ])
                ->get();
            return $actual;
        }

        //Validar datos de entrada
        $this->validate($request, [
            'product-title' => 'required',
            'product-category' => 'required',
            'product-type' => 'required',
            'amount' => 'required',
        ]);

        $date = \Carbon\Carbon::parse('2016-11-01 15:04:19');

        //Chequeo donacion actual
        $donacion_actual = getActualDonation();

        if (count($donacion_actual) > 0) {
            //Agrego el producto a la donación
            saveProduct($request,$donacion_actual[0]->donation_id);
        }
        else {
            //$a = new DateTime;
            //$b = $a->format('d-m-Y');
            //Creo una donación
            /*$donation = new Donation();
            $donation->user_id = Auth::user()->id;
            $donation->status = 'CREANDO';
            $donation->date_from = $date;
            $donation->date_to = $date;
            $donation->time_from = $date;
            $donation->time_to = $date;
            $donation->save(); */
            DB::table('donations')->insert([[
                'created_at' => new DateTime(),
                'user_id' => Auth::user()->id,
                'status' => 'CREANDO',
                'date_from' => NULL,
                'date_to' => NULL,
                'time_from' => NULL,
                'time_to' => NULL,
                'responsible_for_retirement' => '',
                ]]);
            //Obtengo la donación
            $donation = getActualDonation();
            //Agrego el producto a la donación
            saveProduct($request,$donation[0]->donation_id);
        }

        return redirect()->back()->with(['success' => 'Se agregó un nuevo producto']);
    }

    public function delete($id)
    {
        DB::table('products')->where('product_id', '=' , $id)->delete();

        return redirect()->back()->with(['success' => 'Eliminaste correctamente el producto']);
    }

    public function updateAmount(Request $request) {
        $this->validate($request, [
            'product_id' => 'required',
            'amount' => 'required',
        ]);

        DB::table('products')
            ->where('product_id', '=' , $request->product_id)
            ->update([
                'amount' => $request->amount,
            ]);

        return redirect()->back()->with(['success' => 'Actualizaste la cantidad con exito']);
    }
}
