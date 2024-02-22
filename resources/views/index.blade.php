<link rel="stylesheet" href="../css/style.css">
@extends('menu')
<h1>Bienvenue dans le village VVA</h1>
<div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            @if(session('reservationNumber'))
                Numéro de réservation : {{ session('reservationNumber') }}
            @endif
        </div>
    @endif
</div>
<div class="main">
    <div class="recherche">
        <form action="{{ route('index') }}" method="get">
            <label for="filter">Nom:</label>
            <input type="text" name="filter" id="filter" value="{{ request('filter') }}">

            <label for="type_heb">Type d'hébergement:</label>
            <select name="type_heb" id="type_heb">
                <option value="">Tous</option>
                @foreach ($nom_type_heb as $code => $nom)
                    <option value="{{ $code }}" {{ request('type_heb') == $code ? 'selected' : '' }}>{{ $nom }}</option>
                @endforeach
            </select>

            <label for="nb_places">Nombre de places:</label>
            <input type="number" name="nb_places" id="nb_places" value="{{ request('nb_places') }}">

            <label for="surface">La surface:</label>
            <input type="number" name="surface" id="surface" value="{{ request('surface') }}">

            <label for="internet">Internet:</label>
            <input type="checkbox" name="internet" id="internet" {{ request('internet') ? 'checked' : '' }}>

            <label for="secteur">Secteur:</label>
            <select name="secteur" id="secteur">
                <option value="">Tous</option>
                <option value="Secteur A"> Secteur A</option>
                <option value="Secteur B"> Secteur B</option>
                <option value="Secteur C"> Secteur C</option>
            </select>

            <label for="orientation">Orientation:</label>
            <select name="orientation" id="orientation">
                <option value="">Tous</option>
                <option value="Nord">Nord</option>
                <option value="Est">Est</option>
                <option value="Ouest">Ouest</option>
                <option value="Sud">Sud</option>
            </select>

            <label for="etat">Etat:</label>
            <select name="etat" id="etat">
                <option value="">Tous</option>
                <option value="Excellent">Excellent</option>
                <option value="Bon">Bon</option>
                <option value="Moyen">Moyen</option>
                <option value="Mauvais">Mauvais</option>
            </select>

            <label for="tarif">Tarif:</label>
            <input type="number" name="tarif" id="tarif" value="{{ request('tarif') }}">

            <p>Quand vous voulez partir?</p>
            <label >Début de votre séjour:</label>
            <select name="semaine">
                <option value="">Je ne sais pas encore</option>
                @foreach($semaine as $se)
                    <option value="{{ $se->DATEDEBSEM }}" {{ request('semaine') == $se->DATEDEBSEM ? 'selected' : '' }}>{{ $se->DATEDEBSEM }}</option>
                @endforeach
            </select>
            <button type="submit" class="button-recherche">Rechercher</button>
        </form>
    </div>
    <div class="hebergements">
        @foreach ($hebergements as $hebergement)
            <div class="hebergement">
                @if ($hebergement->PHOTOHEB)
                    <img src="{{ asset('storage/photos/' . str_replace('photos/', '', $hebergement->PHOTOHEB)) }}" alt="Photo de l'hébergement">
                @else
                    <p><i>Aucune photo disponible</i></p>
                @endif
                <p><i>Nom :</i> {{ $hebergement->NOMHEB }}</p>

                @if($hebergement->INTERNET == 1)
                    <p><i>Possède une connection internet</i></p>
                    @else
                    <p><i>Ne possède pas de connexion internet</i></p>
                @endif

                <p><i>L'emplacement :</i> {{$hebergement->SECTEURHEB}} <i>situé dans :</i>  {{$hebergement->ORIENTATIONHEB}}</p>
                <p>{{$hebergement->TARIFSEMHEB}} € <i>par semaine</i></p>
                <p></p>
                <a href="{{ route('logementDetail', ['noheb' => $hebergement->NOHEB]) }}">Voire plus de détails</a>
                    <div>
                        @auth
                            @if(Auth::user()->TYPECOMPTE == 'ges')
                                <a href="{{ route('modifier-hebergement', $hebergement->NOHEB) }}">Modifier</a>
                            @endif
                        @endauth
                        @auth
                            @if(Auth::user()->TYPECOMPTE == 'ges' || Auth::user()->TYPECOMPTE == 'vac')
                                <a href="{{route('reservation', ['noheb' => $hebergement->NOHEB])}}">Réserver</a>
                            @endif
                        @endauth
                    </div>
            </div>

        @endforeach
    </div>
</div>

