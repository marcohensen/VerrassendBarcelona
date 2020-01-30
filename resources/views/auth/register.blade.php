@extends('layouts.app')

@section('content')
    <div class="ui vertical stripe segment">
        <div class="ui main container">
            <form class="ui form @if(count( $errors ) > 0) error @endif" method="POST"
                  action="{{ route('register') }}">
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

            <!--name field-->
                <div class="ui form">
                    <label>Name</label>
                    <div class="inline fields">
                        <div class="eight wide field {{ $errors->has('voornaam') ? ' error' : '' }}">
                            <input type="text" placeholder="Voornaam" name="voornaam" required>
                        </div>
                        <div class="three wide field">
                            <input type="text" placeholder="Tussenvoegsel" name="tussenvoegsel">
                        </div>
                        <div class="six wide field {{ $errors->has('achternaam') ? ' error' : '' }}" style="padding-right: 0;">
                            <input type="text" placeholder="Achternaam" name="achternaam" required>
                        </div>
                    </div>
                </div>

                <!--adres field-->
                <div class="field">
                    <label>Adres</label>
                    <div class="field {{ $errors->has('adres') ? ' error' : '' }}">
                        <input type="text" name="adres" placeholder="Adres" required>
                    </div>
                </div>

                <div class="field">
                    <div class="fields">
                        <div class="twelve wide field {{ $errors->has('stad') ? ' error' : '' }}">
                            <input type="text" name="stad" placeholder="Stad" required>
                        </div>
                        <div class="four wide field {{ $errors->has('postcode') ? ' error' : '' }}">
                            <input type="text" name="postcode" placeholder="Postcode" required>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="field {{ $errors->has('Provincie') ? ' error' : '' }}">
                        <input type="text" name="provincie" placeholder="Provincie" required>
                    </div>
                </div>

                <div class="field">
                    <div class="field {{ $errors->has('land') ? ' error' : '' }}">
                        <input type="text" name="land" placeholder="Land" required>
                    </div>
                </div>

                <!--e-mail field-->
                <div class="field {{ $errors->has('email') ? ' error' : '' }}">
                    <label>E-mail</label>
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>

                <!--Telefoon field-->
                <div class="field {{ $errors->has('telefoon') ? ' error' : '' }}">
                    <label>Telefoon</label>
                    <input type="text" name="telefoon" placeholder="telefoon" required>
                </div>

                <!--password field-->
                <div class="field {{ $errors->has('password') ? ' error' : '' }}">
                    <label>Wachtwoord</label>
                    <input type="password" name="password" placeholder="Wachtwoord" required>
                </div>

                <div class="field {{ $errors->has('password') ? ' error' : '' }}">
                    <label>Bevestig Wachtwoord</label>
                    <input type="password" name="password_confirmation" placeholder="Bevestig Wachtwoord" required>
                </div>
                <button class="ui button" type="submit">Submit</button>
            </form>
            <br>
        </div>
    </div>



@endsection
