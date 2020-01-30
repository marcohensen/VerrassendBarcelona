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
                @foreach($users as $user)
                    <form class="@if(count( $errors ) > 0) error @endif" method="post"
                          action="{{ route('Admin.user') }}">
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
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <label>{{$user->voornaam}}</label>
                        <label>{{$user->tussenvoegsel}}</label>
                        <label>{{$user->achternaam}}</label>
                        @if($user->rol == 0)
                            <input type="submit" value="degradeer tot Administrator">
                        @elseif($user->rol == 1)
                            <input type="submit" value="promoveer tot klant">
                        @endif
                    </form>
                    <br>
                @endforeach
            </section>
        @endif
    @endguest
@endsection