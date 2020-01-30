<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use App\Order;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$orders = Order::all();

        foreach($orders as $order){
            $order->cart = unserialize($order->cart);
            return $order;
        }*/

        return view('user');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::id());

        if ($request->input('type') == 'adres') {
            $request->validate([
                'adres' => 'required|string',
                'plaats' => 'required|string',
                'postcode' => 'required|string',
                'provincie' => 'required|string'
            ]);

            $user->adres = $request->adres;
            $user->plaats = $request->plaats;
            $user->postcode = $request->postcode;
            $user->provincie = $request->provincie;
        } else if ($request->input('type') == 'email') {
            $request->validate([
                'email' => 'required|string'
            ]);

            $user->email = $request->email;
        } else if ($request->input('type') == 'wachtwoord') {
            $request->validate([
                'curPassword' => 'required|string|min:6',
                'newPassword' => 'required|string|min:6|confirmed'
            ]);

            $current_password = Auth::user()->password;
            if(Hash::check($request->curPassword, $current_password)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->newPassword);
                $user->save();
                Auth::logout();
            } else {
                return Redirect::back()->withErrors(['Het huidige wachtwoord dat u ingevoerd heeft is incorrect.']);
            }
        } else if ($request->input('type') == 'telefoon') {
            $request->validate([
                'telefoon' => 'required|string'
            ]);
            $user->telefoon = $request->telefoon;
        }

        $user->save();


        return redirect()->route('user');
    }
}
