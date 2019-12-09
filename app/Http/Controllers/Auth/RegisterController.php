<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Giver;
use App\Neighborhood;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
Use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //    protected $redirectTo = '/home';
    protected function redirectTo()
    {
        if (Auth::user()->rol=='giver') {
            return '/donante';
        }
        else {
            return '/home';
        }
    }
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //@Override showRegistrationForm()
    public function showRegistrationForm()
    {
        $neighborhoods = Neighborhood::all();
        return view('auth.register', compact('neighborhoods'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => ['required', 'string', 'max:255', 'unique:givers'],
            'company-cuit' => ['required'],
            'company-phone' => ['required'],
            'address-street' => ['required'],
            'address-number' => ['required'],
            'address-floor' => ['required'],
            'address-apartment' => ['required'],
            'neighborhood' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dni' => ['required'],
            'phone' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /* Creación de usuario */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dni' => $data['dni'],
            'phone' => $data['phone'],
            'rol' => 'giver',
            'isActive' => 0,
        ]);

        //ID de usuario
        $new_user = DB::table('users')
            ->select('id')
            ->where('email', $data['email'])
            ->get();

        /* Creación de donante */
        Giver::create([
            'user_id' => $new_user[0]->id,
            'company_name' => $data['company_name'],
            'company_cuit' => $data['company-cuit'],
            'company_phone' => $data['company-phone'],
            'address_street' => $data['address-street'],
            'address_number' => $data['address-number'],
            'address_floor' => $data['address-floor'],
            'address_apartment' => $data['address-apartment'],
            'neighborhood_id' => $data['neighborhood'],
        ]);

        return $user;

        /*
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dni' => $data['dni'],
            'phone' => $data['phone'],
            'rol' => 'giver',
            'isActive' => 0,
        ]);
        */
    }

}
