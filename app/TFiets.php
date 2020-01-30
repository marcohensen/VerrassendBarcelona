<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TFiets extends Model
{

    //geef aan welke tabel bij deze model hoort en of de timestamps in de tabel staan
    protected $table = 'tour_info';
    public $timestamps = false;

    //geef aan welke velden in de tabel handmatig ingevuld kunnen worden
    protected $fillable = [
        'tPrijs', 'tOmschrijving'
    ];
}
