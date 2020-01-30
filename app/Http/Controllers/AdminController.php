<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HFiets;
use App\TFiets;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        //geef de view aan die op de website moet staan
        return view('admin');
    }

    public function userPagina() {
        //lees alle data uit de user-tabel en zet dat in een variabele. vervolgens wordt die variabele aan een view doorgegeven zodat er in de
        //view mee gewerkt kan worden
        $users = User::all();
        return view('adminUsers', ['users'=>$users]);
    }

    public function updatePagina() {

        /* lees alle data uit de tabellen die gelinkt zijn aan de aangegeven models en zet die in variabelen
        geef vervolgens aan naar welke view gerefereerd wordt en geef de variabelen door zodat er in de view mee gewerkt kan worden */
        $hFiets = HFiets::all();
        $tFiets = TFiets::all();

        return view('adminChange', ['hFiets'=>$hFiets, 'tFiets'=>$tFiets]);
    }

    public function VerwijderPagina() {
        /* lees alle data uit de tabellen die gelinkt zijn aan de aangegeven models en zet die in variabelen
        geef vervolgens aan naar welke view gerefereerd wordt en geef de variabelen door zodat er in de view mee gewerkt kan worden */

        $hFiets = HFiets::all();
        $tFiets = TFiets::all();

        return view('adminDelete', ['hFiets'=>$hFiets, 'tFiets'=>$tFiets]);
    }

    public function destroy(Request $request){
        /*
        lees alle data die in het formulier staan en kijk welke tabel/model aangeroepen moet worden.
        zoek vervolgens in de tabel naar de id die doorgestuurd is en verwijder de rij die erbij hoort.
        */
        if ($request->input('type') == 'huurfiets') {
            $hfiets = HFiets::find($request->id)->delete();
        }
        elseif ($request->input('type') == 'tourfiets'){
            $tfiets = HFiets::find($request->id)->delete();
        }
        return redirect()->route('adminDelete');
    }

    public function update(Request $request)
    {
        /*
        lees wat er in het formulier ingevuld is qua aanpassingen en valideer of het voldoet aan de eisen die hieronder staan.
        vervolgens wordt er gekeken naar welke tabel/model er aangeroepen moet worden. geef door welke velden in de tabel er aangepast moeten worden.
        sluit af door de aanpassingen op te slaan en de terug te sturen naar de view.
        */
        if ($request->input('type') == 'huurfiets') {
            $hfiets = HFiets::find($request->id);
            $request->validate([
                'prijs' => 'required|string',
                'omschrijving' => 'required|string'
            ]);

            $hfiets->prijsPDagdeel = $request->prijs;
            $hfiets->fOmschrijving = $request->omschrijving;

            $hfiets->save();
        }
        elseif ($request->input('type') == 'tourfiets'){
            $tfiets = HFiets::find($request->id);
            $request->validate([
                'prijs' => 'required|string',
                'omschrijving' => 'required|string'
            ]);

            $tfiets->prijsPDagdeel = $request->prijs;
            $tfiets->fOmschrijving = $request->omschrijving;

            $tfiets->save();
        }
        return redirect()->route('adminChange');
    }

    public function toevoegen(Request $request){
        /*
        lees hoeveel fietsen er toegevoegd moeten worden. lus vervolgens door de code totdat het aantal toegevoegde fietsen is bereikt.
        */
        $i = 1;

        $request->validate([
            'aantal' => 'required|integer',
        ]);
        if ($request->input('TourHuur') == 'Huren') {
            while ($i <= $request->aantal) {
                $fiets = HFiets::create([
                    'prijsPDagdeel' => 15,
                    'fOmschrijving' => '- prijs is per 4 uur',
                ]);
                $i++;
            }
        } elseif ($request->input('TourHuur') == 'tour') {
            while ($i <= $request->aantal) {
                TFiets::create([
                    'tPrijs' => 10,
                    'tOmschrijving' => '- prijs is per persoon inclusief fiets.<br>- de tour duurt 2.5 uur',
                ]);
                $i++;
            }
        }
        return view('/adminAdd');
    }

    public function user(Request $request){
        //check welke rol de user heeft die de aanpassing krijgt. pas vervolgens de rol aan en sla de data op.
        $user = User::find($request->id);

        if($user->id == 0) {
            $user->rol = 1;
        }else{
            $user->rol = 0;
        }

        $user->save();
        return view('/welcome');
    }
}
