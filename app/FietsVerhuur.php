<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FietsVerhuur extends Model
{
    //geef aan welke tabel bij deze model hoort en of de timestamps in de tabel staan
    //geef aan welke velden in de tabel handmatig ingevuld kunnen worden

    protected $table = 'fiets_verhuur';

    protected $fillable = [
        'fietsid', 'fDatum', 'fDagdeel', 'userid'
    ];

    //geef aan welke relatie de database heeft met een andere database
    public function fietsen(){
        return $this->hasMany('App\HFiets', 'id', 'fietsid');
    }
}
