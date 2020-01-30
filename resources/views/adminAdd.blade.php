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
                <form class="@if(count( $errors ) > 0) error @endif" method="post" action="{{ route('Admin.toevoegen') }}">
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
                    Hoeveel fietsen wilt u toevoegen?
                    <input type="text" name="aantal"><br>
                    <input type="radio" name="TourHuur" value="Huren">HuurFiets &nbsp;&nbsp;
                    <input type="radio" name="TourHuur" value="tour">TourFiets<br>
                    <input type="submit" value="Voeg Toe">
                </form>
            </section>
        @endif
    @endguest
@endsection