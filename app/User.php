<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //geef aan welke tabel bij deze model hoort en of de timestamps in de tabel staan
    //geef aan welke velden in de tabel handmatig ingevuld kunnen worden
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voornaam', 'tussenvoegsel', 'achternaam', 'adres', 'postcode', 'provincie', 'telefoon', 'stad', 'land', 'borgBetaald', 'rol', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
