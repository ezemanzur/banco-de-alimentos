<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function contactView()
    {
        return view('contact');
    }

    public function registerVolunteerView()
    {
        return view('auth/register_volunteer');
    }

    public function newVolunteer(Request $data) {
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
            'rol' => 'volunteer'
        ]);

        return redirect()->back()->with('success', 'Te has registrado como empleado! Ahora debes esperar por la confirmación de tu solicitud.');
    }
}
