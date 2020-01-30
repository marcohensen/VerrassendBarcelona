@extends('layouts.app')

@section('content')
    <div class="ui vertical stripe segment" style="background: {{ asset('images/bike.png') }} repeat-x;">
        <div class="ui main container" id="loginHeader">
            <h1 class="ui secondary center aligned header">Inloggen</h1>
            <p class="ui center aligned header">Verassend Barcelona</p>
        </div>
    </div>

    <div class="ui vertical stripe segment">
        <div class="ui main container">
            <div class="ui relaxed grid">
                <div class="two column row">
                    <div class="column">
                        <h1 class="ui secondary center aligned header">Bestaande Klant</h1>
                        <form class="ui large form @if(count( $errors ) > 0) error @endif" method="POST"
                              action="{{ route('login') }}">
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

                            <div class="field {{ $errors->has('email') ? ' error' : '' }}">
                                <label for="email">E-mailadres</label>
                                <input type="text" name="email" id="email" placeholder="E-mailadres"
                                       value="{{ old('email') }}"
                                       required autofocus>
                            </div>
                            <div class="field {{ $errors->has('password') ? ' error' : '' }}">
                                <label for="password">Wachtwoord</label>
                                <input type="password" name="password" id="password" placeholder="******" required>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">Ingelogd blijven</label>
                                </div>
                            </div>
                            <button class="ui secondary button" type="submit">Inloggen</button>
                            <br>
                            <span><a href="{{ route('password.request') }}">Wachtwoord vergeten?</a></span>
                        </form>
                    </div>
                    <div class="column center aligned">
                        <h1 class="ui secondary header">Nieuwe Klant</h1>
                        <a class="ui icon header"  href="{{ route('register') }}">
                            <img src="{{ asset('images/icons/copywriter.png') }}" style="height: 100px; width: 100px;">
                        </a>
                        <div>
                            <a class="ui primary button" href="{{ route('register') }}">
                                Registreren
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection