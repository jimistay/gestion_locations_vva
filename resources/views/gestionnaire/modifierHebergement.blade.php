<link rel="stylesheet" href="../../css/ajouter_heb.css">
@extends('menu')
<h1>Modifier les champs nécessaires</h1>
<div class="all_page-heb">
    <div class="ajouter-heb">
        <form class="form-modif-heb"  action="{{ route('modifier-hebergement', $hebergement->NOHEB) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="label-input">
                <label>Type:</label>
                <select name="CODETYPEHEB">
                    @foreach($nom_type_heb as $codeTypeHeb => $nomTypeHeb)
                        <option value="{{ $codeTypeHeb }}" {{ $hebergement->CODETYPEHEB == $codeTypeHeb ? 'selected' : '' }}>
                            {{ $nomTypeHeb }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="label-input">
                <label for="NOMHEB">Nom de l'hébergement:</label>
                <input name="NOMHEB" id="NOMHEB" value="{{ $hebergement->NOMHEB }}">
            </div>

            <div class="label-input">
                <label for="NBPLACEHEB">Nombre de place:</label>
                <input name="NBPLACEHEB" id="NBPLACEHEB" type="number" value="{{ $hebergement->NBPLACEHEB }}">
            </div>
            <div class="label-input">
                <label for="SURFACEHEB">La surface:</label>
                <input name="SURFACEHEB" id="SURFACEHEB" type="number" value="{{ $hebergement->SURFACEHEB }}">
            </div>
            <div class="label-input">
                <label for="INTERNET">Internet:</label>
                <input type="checkbox" name="INTERNET" id="INTERNET" value="1" {{ $hebergement->INTERNET ? 'checked' : '' }}>
            </div>

            <div class="label-input">
                <label for="ANNEEHEB">L'année de sa dernière remise en état:</label>
                <input type="number" name="ANNEEHEB" id="ANNEEHEB" value="{{ $hebergement->ANNEEHEB }}">
            </div>

            <div class="label-input">
                <label for="SECTEURHEB">Secteur:</label>
                <select name="SECTEURHEB">
                    <option value="Secteur A" {{ $hebergement->SECTEURHEB == 'Secteur A' ? 'selected' : '' }}>Secteur A</option>
                    <option value="Secteur B" {{ $hebergement->SECTEURHEB == 'Secteur B' ? 'selected' : '' }}>Secteur B</option>
                    <option value="Secteur C" {{ $hebergement->SECTEURHEB == 'Secteur C' ? 'selected' : '' }}>Secteur C</option>
                </select>
            </div>

            <div class="label-input">
                <label for="ORIENTATIONHEB">Orientation:</label>
                <select name="ORIENTATIONHEB">
                    <option value="Nord" {{ $hebergement->ORIENTATIONHEB == 'Nord' ? 'selected' : '' }}>Nord</option>
                    <option value="Sud" {{ $hebergement->ORIENTATIONHEB == 'Sud' ? 'selected' : '' }}>Sud</option>
                    <option value="Est" {{ $hebergement->ORIENTATIONHEB == 'Est' ? 'selected' : '' }}>Est</option>
                    <option value="Ouest" {{ $hebergement->ORIENTATIONHEB == 'Ouest' ? 'selected' : '' }}>Ouest</option>
                </select>
            </div>

            <div class="label-input">
                <label for="ETATHEB">Etat:</label>
                <select name="ETATHEB">
                    <option value="En rénovation" {{ $hebergement->ETATHEB == 'En rénovation' ? 'selected' : '' }}>En rénovation</option>
                    <option value="Excellent" {{ $hebergement->ETATHEB == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                    <option value="Bon" {{ $hebergement->ETATHEB == 'Bon' ? 'selected' : '' }}>Bon</option>
                    <option value="Mauvais" {{ $hebergement->ETATHEB == 'Mauvais' ? 'selected' : '' }}>Mauvais</option>
                </select>
            </div>

            <div class="label-input">
                <label for="DESCRIHEB">Description:</label>
                <input name="DESCRIHEB" id="DESCRIHEB" value="{{ $hebergement->DESCRIHEB }}">
            </div>

            <div class="label-input">
                <label for="TARIFSEMHEB">Tarif:</label>
                <input type="number" name="TARIFSEMHEB" id="TARIFSEMHEB" value="{{ $hebergement->TARIFSEMHEB }}">
            </div>
            <div class="label-input">
                <label for="PHOTOHEB">Photographie:</label>
                <input type="file" name="PHOTOHEB" id="PHOTOHEB">
            </div>

            <div class="btn-ajout-heb">
                <button class="ajouter-btn-heb" type="submit">Enregistrer les modifications</button>
            </div>


        </form>
    </div>
</div>
