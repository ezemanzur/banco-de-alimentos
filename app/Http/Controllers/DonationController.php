<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Product;
use Egulias\EmailValidator\Exception\DotAtEnd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DonationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function create()
    {
        return view('donation.create');
    }

    public function save(Request $request)
    {


        $cantidad = $request->input('cantidad');
        $date_of_delivery = $request->input('date_of_delivery');
        $category_id = $request->input('category_id');
        $expiration_date = $request->input('expiration_date');
        $donation = new Donation();
        $donation->user_id = Auth::user()->id;
        $donation->state = Donation::ESTADO_VIGENTE;
        $donation->date_of_delivery = $date_of_delivery;
        $p=[];
        for ($i = 0; $i < count($cantidad); $i++) {
            for ($j = 0; $j < $cantidad[$i]; $j++) {
                $product = New Product();
                $product->category_id = $category_id[$i];
                $product->expiration_date = $expiration_date[$i];
                $p[]=$product;
//                $donation->products->add($product);
            }

        }
        $donation->save();
        $donation->products()->saveMany($p);
        return redirect()->route('donante')-> with(['message' => 'Se agrego una nueva donación']);
    }

    public function addProductInput(Request $request)
    {

        $categories = DB::table('categories')
            ->get();
        $options = '<option selected disabled>Categoria</option>';
        foreach ($categories as $category) {
            $options .= '<option value="' . $category->id . '">' . $category->name . '</option>';
        }
        $i = 1;
        //fixme agregar los nombres de las categorias al select.
        $inputs = '<tr  id="row' . $i . '" class="dynamic-added">
        <td><input type="number" name="cantidad[]" placeholder="Cantidad de productos" class="form-control name_list" /></td>
        <td><select id="category" type="text" class="form-control browser-default custom-select" name="category_id[]" autofocus>
                ' . $options . '
            </select>
        </td>
        <td><input type="date" name="expiration_date[]" class="form-control name_list" /></td>
        <td><button type="button" name="remove" id="' . $i . '" class="btn btn-danger btn_remove">X</button></td>
    </tr>';


        return response()->json(['inputs' => $inputs]);


        // return response()->json(['error'=>$validator->errors()->all()]);
    }
}
