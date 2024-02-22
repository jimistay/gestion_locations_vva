<?php

namespace App\Http\Controllers\gestionnaire;

use App\Http\Controllers\Controller;
use App\Models\Hebergement;
use App\Models\Type_heb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GestionHebergementsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        $user = optional(Auth::user());

        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }

        if ($request->session()->has('TYPECOMPTE') && $request->session()->get('TYPECOMPTE') == 'ges') {
            $type_heb = Type_heb::all();
            $nom_type_heb = $type_heb->pluck('NOMTYPEHEB', 'CODETYPEHEB')->all();
            return view('gestionnaire.ajouterHebergement', compact('type_heb', 'nom_type_heb'));
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = optional(Auth::user());

        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }

        if ($request->session()->has('TYPECOMPTE') && $request->session()->get('TYPECOMPTE') == 'ges') {
            $validatedData = $request->validate([
                'CODETYPEHEB' => 'required',
                'NOMHEB' => 'required',
                'NBPLACEHEB' => 'nullable|numeric',
                'SURFACEHEB' => 'nullable|numeric',
                'INTERNET' => 'nullable|boolean',
                'ANNEEHEB' => 'nullable|numeric',
                'SECTEURHEB' => 'nullable',
                'ORIENTATIONHEB' => 'nullable',
                'ETATHEB' => 'nullable',
                'DESCRIHEB' => 'nullable',
                'TARIFSEMHEB' => 'nullable|numeric',
                'PHOTOHEB' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $validatedData['INTERNET'] = $request->filled('INTERNET');

            $validatedData['SECTEURHEB'] = $request->input('SECTEURHEB');
            $validatedData['ORIENTATIONHEB'] = $request->input('ORIENTATIONHEB');
            $validatedData['ETATHEB'] = $request->input('ETATHEB');

            if ($request->hasFile('PHOTOHEB')) {
                $photoPath = $request->file('PHOTOHEB')->store('photos', 'public');
                $validatedData['PHOTOHEB'] = $photoPath;
            }

            Hebergement::create($validatedData);

            return redirect()->route('ajouter-un-hebergement')->with('success', 'Hébergement ajouté avec succès');
        } else {
            return redirect('/');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($noheb, Request $request)
    {
        $user = optional(Auth::user());

        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }

        if ($request->session()->has('TYPECOMPTE') && $request->session()->get('TYPECOMPTE') == 'ges') {
            $type_heb = Type_heb::all();
            $nom_type_heb = $type_heb->pluck('NOMTYPEHEB', 'CODETYPEHEB')->all();

            $hebergement = Hebergement::where('NOHEB', $noheb)->first();

            return view('gestionnaire.modifierHebergement', compact('hebergement', 'nom_type_heb'));
        } else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $noheb)
    {
        $user = optional(Auth::user());

        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }
        if ($request->session()->has('TYPECOMPTE') && $request->session()->get('TYPECOMPTE') == 'ges') {
            $hebergement = Hebergement::where('NOHEB', $noheb)->first();

            // Valider les données du formulaire
            $validatedData = $request->validate([
                'CODETYPEHEB' => 'required',
                'NOMHEB' => 'required',
                'NBPLACEHEB' => 'nullable|numeric',
                'SURFACEHEB' => 'nullable|numeric',
                'INTERNET' => 'nullable|boolean',
                'ANNEEHEB' => 'nullable|numeric',
                'SECTEURHEB' => 'nullable',
                'ORIENTATIONHEB' => 'nullable',
                'ETATHEB' => 'nullable',
                'DESCRIHEB' => 'nullable',
                'TARIFSEMHEB' => 'nullable|numeric',
                'PHOTOHEB' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Si le champ INTERNET n'est pas coché il a une valeur par défaut
            $validatedData['INTERNET'] = $request->filled('INTERNET');

            if ($request->hasFile('PHOTOHEB')) {
                // Supprime l'ancienne photo
                if ($hebergement->PHOTOHEB) {
                    Storage::disk('public')->delete($hebergement->PHOTOHEB);
                }
                $photoPath = $request->file('PHOTOHEB')->store('photos', 'public');
                // Mise à jour du chemin du fichier
                $validatedData['PHOTOHEB'] = $photoPath;
            }

            $hebergement->update($validatedData);

            return redirect()->route('ajouter-un-hebergement')->with('success', 'Hébergement modifié avec succès');

        } else {
            return redirect('/');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
