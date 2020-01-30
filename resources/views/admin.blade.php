@extends('layouts.app')
@section('content')
    @guest
        <section>
            <h1 id="catH4" style="margin-top: 100px;">
                Log in AUB
            </h1>
        </section>
    @else
        @if(Auth::user()->rol == 0)
            <section>
                <h1 id="catH4" style="margin-top: 100px;">
                    U heeft geen bevoegheid voor deze pagina
                </h1>
            </section>
        @else
            <section>
                Kies Welke actie u wilt uitvoeren:
                <ul>
                    <li><a href="/adminAdd">Fiets(en) Toevoegen</a></li>
                    <li><a href="/adminChange">Fietsinformatie Wijzigen</a></li>
                    <li><a href="/adminDelete">Fiets(en) Verwijderen</a></li>
                    <li><a href="/adminUsers">Administrator toevoegen of Verwijderen</a></li>
                </ul>
            </section>
        @endif
    @endguest
@endsection