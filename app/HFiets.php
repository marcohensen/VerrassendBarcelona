<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HFiets extends Model
{
    //geef aan welke tabel bij deze model hoort en of de timestamps in de tabel staan
    //geef aan welke velden in de tabel handmatig ingevuld kunnen worden

    protected $table = 'fiets_info';
    public $timestamps = false;
    protected $fillable = [
      'prijsPDagdeel', 'fOmschrijving'
    ];

    //geef aan welke relaties deze tabel heeft met andere tabellen
    public function reserveringen() {
        return $this->belongsToMany('App\FietsVerhuur');
    }
}
