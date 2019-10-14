<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Product;
use Egulias\EmailValidator\Exception\DotAtEnd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function create(){
         return view('donation.create');
    }
    public function save(Request $request){

        $donation= new Donation();
        $cantidad=$request->input('cantidad');
        $category_id=$request->input('category_id');
        $expiration_date=$request->input('expiration_date');
        $p=[];
        for ($i = 0; $i < count($cantidad); $i++){

            //Crear constructor con los datos.
           $p[]= new Product($cantidad[$i],$category_id[$i],$expiration_date[$i]);
        }

        //agregar donante y productos a la donacion y guardar.

        var_dump($request->input());
        die;
    }

    public function addProductInput(Request $request)
    {
        $i=1;
        //fixme agregar los nombres de las categorias al select.
        $inputs='<tr  id="row' . $i .'" class="dynamic-added">
        <td><input type="number" name="cantidad[]" placeholder="Cantidad de productos" class="form-control name_list" /></td>
        <td><select id="category" type="text" class="form-control browser-default custom-select" name="category_id[]" autofocus>
                <option selected disabled>Categoria</option>
                <option value="1">Leche 1L</option>
                <option value="2">Leche Tetra 1L</option>
                <option value="3">Arroz 1KG</option>
            </select>
        </td>
        <td><input type="date" name="expiration_date[]" class="form-control name_list" /></td>
        <td><button type="button" name="remove" id="'.$i. '" class="btn btn-danger btn_remove">X</button></td>
    </tr>';





        return response()->json(['inputs'=>$inputs]);


        // return response()->json(['error'=>$validator->errors()->all()]);
    }
}
