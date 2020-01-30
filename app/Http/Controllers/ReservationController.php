<?php

namespace App\Http\Controllers;

use App\FietsVerhuur;
use App\HFiets;
use App\TourDeelname;
use Auth;
use Illuminate\Http\Request;


class ReservationController extends controller
{
    public function index()
    {
        //geef de view aan die op de website moet staan
        return view('reserveren');
    }

    public function Datumindex()
    {
        //geef de view aan die op de website moet staan
        return view('datumpick');
    }

    public function datum(Request $request)
    {
        //geef de view aan die op de website moet staan samen met de datum die aan is gegeven op de vorige pagina
        $datum = $request->datum;
        return view('Reserveren', ['datum' => $datum]);
    }

    public function FietsVerhuur(Request $request)
    {
        //lees alle data uit die niet standaard in is gevuld vanuit de database.
        //check of het gaat om fietsen huren of meedoen met de tour.
        //lus vervolgens door totdat het aantal gereeserveerde fietsen is bereikt en maak een rij met data aan voor iedere fiets.
        $i = 1;
        $request->validate([
            'aantalfietsen' => 'required|integer',
            'datum' => 'required|string',
            'dagdeel' => 'required|string',
        ]);
        if ($request->input('TourHuur') == 'huren') {
            while ($i <= $request->aantalfietsen) {

                $fiets = FietsVerhuur::create([
                    'fietsid' => $i,
                    'userid' => Auth::user()->id,
                    'fDatum' => $request->datum,
                    'fDagdeel' => $request->dagdeel
                ]);
                $i++;
            }
        } elseif ($request->input('TourHuur') == 'tour') {
            while ($i <= $request->aantalfietsen) {
                TourDeelname::create([
                    'tourId' => $i,
                    'userid' => Auth::user()->id,
                    'tDatum' => $request->datum,
                    'tDagdeel' => $request->dagdeel
                ]);
                $i++;
            }
        }
        return redirect(route('Reserveren'));
    }
}