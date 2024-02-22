<link rel="stylesheet" href="../css/detail_heb.css">
@extends('menu')
<div class="hebergements">
    <div class="hebergement">
        <p class="p_heb"><i>Nom :</i>  {{ $hebergement->NOMHEB }}</p>
        <p class="p_heb"><i>Type de l'hébérgement :</i>  {{ $nom_type_heb[$hebergement->CODETYPEHEB] }}</p>
        <p class="p_heb"><i>Nombre de places :</i>  {{$hebergement->NBPLACEHEB}}</p>
        <p class="p_heb"><i>Surface :</i>  {{$hebergement->SURFACEHEB}}</p>
        @if($hebergement->INTERNET == 1)
            <p class="p_heb"><i>Possède une connection internet</i> </p>
        @endif
        <p class="p_heb"><i>Année de la dernière remise en état :</i>  {{$hebergement->ANNEEHEB}}</p>
        <p class="p_heb"><i>L'emplacement :</i>  {{$hebergement->SECTEURHEB}} <i>situé dans :</i>  {{$hebergement->ORIENTATIONHEB}}</p>
        <p class="p_heb"><i>L'état :</i>  {{$hebergement->ETATHEB}}</p>
        <p class="p_heb"><i>Description :</i>  {{$hebergement->DESCRIHEB}}</p>
        <p class="p_heb"><i>Photo : </i> </p>
        @if ($hebergement->PHOTOHEB)
            <img src="{{ asset('storage/photos/' . str_replace('photos/', '', $hebergement->PHOTOHEB)) }}" alt="Photo de l'hébergement">
        @else
            <p class="p_heb"><i>Aucune photo disponible</i> </p>
        @endif
        <p class="p_heb"><i>Tarif :</i>  {{$hebergement->TARIFSEMHEB}}€ <i>par semaine</i></p>
    </div>
</div>
