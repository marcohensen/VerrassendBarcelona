<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //check of de ingevulde data van het registratie formulier voldoet aan de eisen die hieronder staan
        return Validator::make($data, [
            'voornaam' => 'required|string|max:255',
            'tussenvoegsel' => 'present|max:255',
            'achternaam' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'adres' => 'required|string|max:255',
            'telefoon' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'provincie' => 'required|string|max:255',
            'land' => 'required|string|max:255',
            'stad' => 'required|string|max:255',
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
        //maak een nieuwe rij aan in de tabel met de gegevens die in de registratie formulier ingevuld zijn
        return User::create([
            'voornaam' => $data['voornaam'],
            'tussenvoegsel' => $data['tussenvoegsel'],
            'achternaam' => $data['achternaam'],
            'adres' => $data['adres'],
            'postcode' => $data['postcode'],
            'provincie' => $data['provincie'],
            'stad' => $data['stad'],
            'telefoon' => $data['telefoon'],
            'borgBetaald' => false,
            'email' => $data['email'],
            'land' => $data['land'],
            'rol' => 0,
            'password' => Hash::make($data['password']),
        ]);
    }
}
