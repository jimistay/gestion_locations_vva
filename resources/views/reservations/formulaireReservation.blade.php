<link rel="stylesheet" href="../../css/formulaire_resa.css">
@extends('menu')
<h2>Reservez votre logement</h2>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="reservation-heb">
    <div class="reservation-formulaire">
        <form class="reservation-formulaire" method="POST" action="{{ route('reservation.store', ['noheb' => $noheb]) }}">
            @csrf

            <label>Semaines disponibles</label>
            <select name="semaine">
                @foreach($semaine as $se)
                    @php
                        $reservationsExist = \App\Models\Resa::where('noheb', $noheb)
                            ->where('DATEDEBSEM', $se->DATEDEBSEM)
                            ->exists();
                    @endphp

                    @unless($reservationsExist)
                        <option value="{{ $se->DATEDEBSEM }}" {{ request('semaine') == $se->DATEDEBSEM ? 'selected' : '' }}>
                            {{ $se->DATEDEBSEM }}
                        </option>
                    @endunless
                @endforeach
            </select>
            <a class="p-reservation" href="{{route('index')}}"><i>Aucune semaine ne vous convient ? Choisissez en une ici à partir de vos critères</i></a>

            <p class="p-reservation"><i>Pour l'utilisateur :</i>  {{$user->name}}</p>

            <label for="NBOCCUPANT">Le nombre d'occupants :</label>
            <input type="number" name="NBOCCUPANT" id="NBOCCUPANT">

            <button class="button-reservation" type="submit">Réserver</button>
        </form>
    </div>

</div>
