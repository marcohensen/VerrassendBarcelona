@extends('layouts.app')
@section('content')
    @guest
        <section>
            <h1 id="catH4" style="margin-top: 100px;">
                Om deze pagina te kunnen bekijken moet u eerst inloggen
            </h1>
        </section>
    @else
        <div class="ui vertical stripe quote segment">
            <div class="ui equal width stackable internally celled grid">
                <div class="center aligned row">
                    <div class="column">
                        <h1>Fietsen Huren</h1>
                        <form class="ui form @if(count( $errors ) > 0) error @endif" method="POST"
                              action="{{ route('Reserveren.fiets') }}">
                            @csrf
                            @if(count( $errors ) > 0)
                                <div class="ui error message">
                                    <div class="header">Er is iets fout gegaan</div>
                                    <ul class="list">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            Naam:
                            <input type="text" value="{{Auth::user()->voornaam}}" placeholder="voornaam"
                                   name="voornaam">
                            <input type="text" value="{{Auth::user()->tussenvoegsel}}" placeholder="tussenvoegsel"
                                   name="tussenvoegsel">
                            <input type="text" value="{{Auth::user()->achternaam}}" placeholder="achternaam"
                                   name="achternaam"> <br>
                            Adres:
                            <input type="text" value="{{Auth::user()->adres}}" name="adres" placeholder="adres"><br>
                            Postcode:
                            <input type="text" value="{{Auth::user()->postcode}}" name="postcode"
                                   placeholder="postcode"><br>
                            stad:
                            <input type="text" value="{{Auth::user()->stad}}" name="stad" placeholder="stad"><br>
                            Land:
                            <input type="text" value="{{Auth::user()->land}}" name="land" placeholder="land"><br>
                            <br>
                            Aantal fietsen:
                            <input type="text" name="aantalfietsen" placeholder="aantal Fietsen"><br>
                            Datum:
                            <input type="date" value="{{$datum}}" name="datum"><br><br>
                            Dagdeel: &nbsp;
                            <input type="radio" value="Ochtend" name="dagdeel">Ochtend &nbsp;
                            <input type="radio" value="Middag" name="dagdeel">Middag<br>
                            <br>
                            Wilt u Fietsen Huren of wilt u deelnemen aan de tour?<br>
                            <input type="radio" value="huren" name="TourHuur">Fiets Huren &nbsp;&nbsp;
                            <input type="radio" value="tour" name="TourHuur">Deelname Tour

                            <br>
                            <button type="submit" value="Reserveer">Reserveer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection