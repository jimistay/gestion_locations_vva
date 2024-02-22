<link rel="stylesheet" href="../../css/connexion.css">
<link rel="stylesheet" href="../../css/menu.css">
@extends('menu')
<h1 class="connexion-h1">Se connecter</h1>
<div class="all-page-connexion">
    <div class="elements-connexion">
        <form action="{{ route('auth.login') }}" method="post">
            @csrf
            <div class="login">
                <label class="label-style-connexion" for="email">Email</label>
                <input class="input-style-connexion" type="email" id="email" name="email" value="{{old('email')}}">
                @error("email")
                {{$message}}
                @enderror
            </div>
            <div class="password">
                <label class="label-style-connexion" for="password">Mot de passe</label>
                <input class="input-style-connexion" type="password" id="password" name="password">
                @error("password")
                {{$message}}
                @enderror
            </div>
            <button class="connexion-button">Se connecter</button>
        </form>
    </div>
</div>
