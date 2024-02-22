<?php

namespace App\Http\Controllers;

use App\Models\Hebergement;
use App\Models\Resa;
use App\Models\Semaine;
use App\Models\Type_heb;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    /*
        User::create([
            'name'=>'Lea',
            'email'=>'lea@gmail.com',
            'password'=>Hash::make('0000')
        ]);
        User::create([
            'name'=>'Jasmine',
            'email'=>'jasmine@gmail.com',
            'password'=>Hash::make('0000')
        ]);
        User::create([
            'name'=>'Alex',
            'email'=>'alex@gmail.com',
            'password'=>Hash::make('0000')
        ]);
        User::create([
            'name'=>'Arthur',
            'email'=>'arthur@gmail.com',
            'password'=>Hash::make('0000')
        ]);
*/

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $hebergements = Hebergement::query();
        $type_heb = Type_heb::all();
        $nom_type_heb = $type_heb->pluck('NOMTYPEHEB', 'CODETYPEHEB')->all();
        $user = User::all();

        $semaine = Semaine::all();

        $hebergementsReserves = Resa::where('DATEDEBSEM', request('semaine'))->pluck('NOHEB');

        // Exclure les hébergements réservés de la requête principale
        $hebergements->whereNotIn('NOHEB', $hebergementsReserves);

        $user = Auth::user();
        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }

        if (request()->has('filter')) {
            $hebergements->where('NOMHEB', 'like', '%' . request('filter') . '%');
        }
        if (request()->filled('type_heb')) {
            $hebergements->where('CODETYPEHEB', request('type_heb'));
        }
        if (request()->filled('nb_places')) {
            $hebergements->where('NBPLACEHEB', request('nb_places'));
        }
        if (request()->filled('surface')){
            $hebergements->where('SURFACEHEB', request('surface'));
        }
        if (request()->filled('internet')) {
            $hebergements->where('INTERNET', '=', '1');
        }
        if (request()->filled('secteur')){
            $hebergements->where('SECTEURHEB', request('secteur'));
        }
        if (request()->filled('orientation')){
            $hebergements->where('ORIENTATIONHEB', request('orientation'));
        }
        if (request()->filled('etat')){
            $hebergements->where('ETATHEB', request('etat'));
        }
        if (request()->filled('tarif')){
            $hebergements->where('TARIFSEMHEB', request('tarif'));
        }
        if (request()->filled('semaine')) {
            $hebergements->whereNotIn('NOHEB', $hebergementsReserves);
        }
        $hebergements = $hebergements->get();

        return view('index', compact('hebergements', 'nom_type_heb', 'user',  'semaine', 'hebergementsReserves'));
    }
    public function logementDetail($noheb)
    {

        $hebergement = Hebergement::where('NOHEB', $noheb)->first();

        $type_heb = Type_heb::all();
        $nom_type_heb = $type_heb->pluck('NOMTYPEHEB', 'CODETYPEHEB')->all();

        return view('hebergement', compact('hebergement', 'nom_type_heb'));
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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
