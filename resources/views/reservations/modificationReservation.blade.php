<link rel="stylesheet" href="../../css/detail_resa.css">
@extends('menu')
<h1>Modifier votre réservation</h1>
<div class="main">
    <form class="detail-resa" method="POST" action="{{ route('updateReservation', ['noresa' => $reservation->NORESA]) }}">
        @csrf
        @method('PATCH')
        <p class="p-detail-resa"><i>Numéro de la réservation :</i>  {{$reservation->NORESA}}</p>
        <p><i>Par l'utilisateur :</i>  {{ $reservation->user->name }} (ID: {{ $reservation->id }})</p>
        <p><i>Date de début de sejour :</i>  {{$reservation->DATEDEBSEM}}</p>
        <p><i>Numéro d'hébergement :</i>  {{ $reservation->hebergement->NOMHEB }} (Numéro: {{ $reservation->NOHEB }})</p>
        <p><i>Date de réservation :</i>  {{$reservation->DATERESA}}</p>
        <p><i>Montant des arrhes :</i>  {{$reservation->MONTANTARRHES}}</p>
        <p><i>Nombre d'occupants :</i>  {{$reservation->NBOCCUPANT}}</p>
        <p><i>Tarif de la semaine de réservation :</i>  {{$reservation->TARIFSEMRESA}}</p>
        <label for="CODEETATRESA">Etat de réservation :</label>
        <p><i>Etat de réservation :</i>  {{$reservation->CODEETATRESA}}</p>
        <select name="CODEETATRESA" id="CODEETATRESA">
            <option value="AN" {{ $etat_actuel == 'AN' ? 'selected' : '' }}>Annulée</option>
            <option value="AV" {{ $etat_actuel == 'AV' ? 'selected' : '' }}>Arrhes versées</option>
            <option value="BL" {{ $etat_actuel == 'BL' ? 'selected' : '' }}>Bloquée</option>
            <option value="CR" {{ $etat_actuel == 'CR' ? 'selected' : '' }}>Clés retirés</option>
            <option value="SL" {{ $etat_actuel == 'SL' ? 'selected' : '' }}>Solde</option>
            <option value="TR" {{ $etat_actuel == 'TR' ? 'selected' : '' }}>Terminée</option>
        </select>
        <button type="submit">Enregistrer les modifications</button>
    </form>
</div>
