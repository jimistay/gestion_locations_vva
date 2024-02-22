<link rel="stylesheet" href="../../css/detail_resa.css">
@extends('menu')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="main">
    <div class="detail-resa">
        <p class="p-detail-resa"><i>N° de réservation :</i> {{ $reservations->NORESA }}</p>
        <p class="p-detail-resa"><i>Loué par : </i> {{ $reservations->user->name }} id n° {{$reservations->id}}</p>
        <p class="p-detail-resa"><i>Numéro d'hébergement :</i>  {{ $reservations->NOHEB }}</p>
        <p class="p-detail-resa"><i>Etat de réservation : </i> {{ $reservations->etat_resa->NOMETATRESA }}</p>
        <p class="p-detail-resa"><i>Date de réservation :</i>  {{ $reservations->DATERESA }}</p>
        <p class="p-detail-resa"><i>Arrhes :</i>  {{ $reservations->DATEARRHES }}</p>
        <p class="p-detail-resa"><i>Montant Arrhes :</i>  {{ $reservations->MONTANTARRHES }}€</p>
        <p class="p-detail-resa"><i>Nombre d'occupants :</i>  {{ $reservations->NBOCCUPANT }}</p>
        <p class="p-detail-resa"><i>Tarif :</i>  {{ $reservations->TARIFSEMRESA }} € <i>par semaine</i></p>
    </div>
</div>
