@extends('base')
@section('title', 'Home')

@section('content')
    <div>
        Bienvenue
        <a href="{{ route('app.loginForm') }}">Se connecter</a>
    </div>
@endsection
