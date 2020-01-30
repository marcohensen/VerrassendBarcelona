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
                Huurfietsen
                    @foreach($hFiets as $fiets)
                        <form class="@if(count( $errors ) > 0) error @endif" method="post" action="{{ route('Admin.aanpassen') }}">
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
                            <input type="hidden" name="type" value="huurfiets">
                            <input type="hidden" name="id" value="{{$fiets->id}}">
                            <input type="text" name="omschrijving" value="{{$fiets->fOmschrijving}}">
                            <input type="text" name="prijs" value="{{$fiets->prijsPDagdeel}}">
                            <input type="submit" value="Pas Aan">
                        </form>
                    @endforeach
                <br>
                TourFietsen
                @foreach($tFiets as $fiets)
                    <form class="@if(count( $errors ) > 0) error @endif" method="post" action="{{ route('Admin.aanpassen') }}">
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
                        <input type="hidden" name="type" value="tourfiets">
                        <input type="hidden" name="id" value="{{$fiets->id}}">
                        <input type="text" name="omschrijving" value="{{$fiets->tOmschrijving}}">
                        <input type="text" name="prijs" value="{{$fiets->tPrijs}}">
                        <input type="submit" value="Pas Aan">
                    </form>
                @endforeach
            </section>
        @endif
    @endguest
@endsection