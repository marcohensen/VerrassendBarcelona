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
                              action="{{ route('Datumpick.datum') }}">
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
                            Datum:
                            <input type="date" value="" name="datum"><br>
                            <button type="submit" value="dateSelect">Selecteer Datum</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection