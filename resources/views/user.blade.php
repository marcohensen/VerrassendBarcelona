@extends('layouts.app')
@section('content')
    <div class="ui vertical stripe quote segment">
        <div class="ui equal width stackable internally celled grid">
            <div class="center aligned row">
                <div class="column">
                    <form class="ui form @if(count( $errors ) > 0) error @endif" method="POST"
                          action="{{ route('user.update') }}">
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
                        <input type="hidden" name="type" value="adres">
                        <!--adres field-->
                        <div class="field">
                            <h3>Wijzig Adres</h3>
                            <div class="field {{ $errors->has('adres') ? ' error' : '' }}">
                                <input type="text" name="adres" placeholder="Adres" value="{{ Auth::user()->adres }}"
                                       required>
                            </div>
                        </div>

                        <div class="field">
                            <div class="fields">
                                <div class="twelve wide field {{ $errors->has('plaats') ? ' error' : '' }}">
                                    <input type="text" name="plaats" value="{{ Auth::user()->stad }}"
                                           value="{{ Auth::user()->plaats }}" required>
                                </div>
                                <div class="four wide field {{ $errors->has('postcode') ? ' error' : '' }}">
                                    <input type="text" name="postcode" placeholder="Postcode"
                                           value="{{ Auth::user()->postcode }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="field {{ $errors->has('Provincie') ? ' error' : '' }}">
                                <input type="text" name="provincie" placeholder="Provincie"
                                       value="{{ Auth::user()->provincie }}" required>
                            </div>
                        </div>
                        <button class="ui button" type="submit">Wijzig Adres</button>
                    </form>
                </div>
                <div class="column">
                    <form class="ui form @if(count( $errors ) > 0) error @endif" method="POST"
                          action="{{ route('user.update') }}">
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
                        <input type="hidden" name="type" value="email">
                        <h3>Wijzig E-mail</h3>
                        <div class="field {{ $errors->has('email') ? ' error' : '' }}">
                            <input type="email" name="email" placeholder="E-mail" value="{{ Auth::user()->email }}"
                                   required>
                        </div>
                        <button class="ui button" type="submit">Wijzig E-mail</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="ui vertical stripe quote segment">
        <div class="ui equal width stackable internally celled grid">
            <div class="center aligned row">
                <div class="column">
                    <form class="ui form @if(count( $errors ) > 0) error @endif" method="POST"
                          action="{{ route('user.update') }}">
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
                        <input type="hidden" name="type" value="wachtwoord">
                        <!--password field-->
                        <h3>Wachtwoord Wijzigen</h3>
                        <div class="field {{ $errors->has('password') ? ' error' : '' }}">
                            <input type="password" name="curPassword" placeholder="Huidig Wachtwoord" required>
                        </div>

                        <div class="field {{ $errors->has('password') ? ' error' : '' }}">
                            <input type="password" name="newPassword" placeholder="Nieuw Wachtwoord" required>
                        </div>

                        <div class="field {{ $errors->has('password') ? ' error' : '' }}">
                            <input type="password" name="newPassword_confirmation" placeholder="Bevestig Wachtwoord"
                                   required>
                        </div>
                        <button class="ui button" type="submit">Wijzig Wachtwoord</button>
                    </form>
                </div>
                <div class="column">
                    <form class="ui form @if(count( $errors ) > 0) error @endif" method="POST"
                          action="{{ route('user.update') }}">
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
                        <input type="hidden" name="type" value="telefoon">
                        <div class="field {{ $errors->has('telefoon') ? ' error' : '' }}">
                            <h3>Wijzig Telefoon</h3>
                            <input type="text" name="telefoon" placeholder="telefoon"
                                   value="{{ Auth::user()->telefoon }}" required>
                        </div>
                        <button class="ui button" type="submit">Wijzig Telefoon</button>
                    </form>
                </div>
            </div>
            <div class="center aligned row">
                <div class="column">
                    <h2>Mijn Reserveringen</h2>

                </div>
            </div>
        </div>
    </div>
@endsection