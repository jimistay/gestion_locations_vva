<link rel="stylesheet" href="../../css/list_resa.css">
@extends('menu')
<h2>Les réservations</h2>
<div class="main">
    <div class="recherche">
        <form class="recherche-resa" method="get" action="{{ route('reservations') }}">
            @csrf
            <label>Semaine</label>
            <select name="semaine">
                @foreach($semaine as $se)
                    <option value="{{ $se->DATEDEBSEM }}" {{ request('semaine') == $se->DATEDEBSEM ? 'selected' : '' }}>{{ $se->DATEDEBSEM }}</option>
                @endforeach
            </select>
            <label>Par utilisateur</label>
            <select name="id">
                <option value="">Tous</option>
                @foreach($utilisateurs as $utilisateur)
                    <option value="{{ $utilisateur->id }}" {{ request('id') == $utilisateur->id ? 'selected' : '' }}>{{ $utilisateur->name }}</option>
                @endforeach
            </select>

            <label>Hébergement</label>
            <select name="NOHEB">
                <option value="">Tous</option>
                @foreach($hebergements as $hebergement)
                    <option value="{{ $hebergement->NOHEB }}" {{ request('NOHEB') == $hebergement->NOHEB ? 'selected' : '' }}>{{ $hebergement->NOMHEB }}</option>
                @endforeach
            </select>
            <button class="btn-list-resa" type="submit">Rechercher</button>
        </form>
    </div>


    <div class="reservations">
        @foreach ($reservations as $reservation)
            <div class="reservation">
                <p class="p-list-resa">N° de réservation : {{ $reservation->NORESA }}</p>
                <p class="p-list-resa">Loué par : {{ $reservation->user->name }} l'id n° {{$reservation->id}}</p>
                <p class="p-list-resa">Numéro d'hébergement : {{ $reservation->NOHEB }}</p>
                <a class="a-list-resa" href="{{ route('reservationDetail', ['noresa' => $reservation->NORESA]) }}">Voir plus de détails</a>
                @auth
                    @if(Auth::user()->TYPECOMPTE == 'ges' && \Carbon\Carbon::parse($reservation->DATEDEBSEM)->gt(\Carbon\Carbon::now()))
                        <a class="a-list-resa" href="{{ route('modificationReservation', ['noresa' => $reservation->NORESA]) }}">Modifier</a>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
</div>

