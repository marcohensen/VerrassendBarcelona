<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourDeelname extends Model
{
    //geef aan welke tabel bij deze model hoort en of de timestamps in de tabel staan
    //geef aan welke velden in de tabel handmatig ingevuld kunnen worden
    protected $table = 'tour_verhuur';

    protected $fillable = [
        'tourId', 'tDatum', 'tDagdeel', 'userid'
    ];
}
