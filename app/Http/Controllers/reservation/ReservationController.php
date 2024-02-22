<?php

namespace App\Http\Controllers\reservation;

use App\Http\Controllers\Controller;
use App\Models\Etat_resa;
use App\Models\Hebergement;
use App\Models\Resa;
use App\Models\Semaine;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $noheb)
    {
        $user = optional(Auth::user());

        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }

        if ($request->session()->has('TYPECOMPTE') && $request->session()->get('TYPECOMPTE') == 'ges' ||  $request->session()->get('TYPECOMPTE') == 'vac') {
            $semaine = Semaine::all();

            return view('reservations.formulaireReservation', compact('semaine', 'user', 'noheb'));
        } else {
            return redirect('/');
        }
    }

    public function listReservations(Request $request)
    {
        $user = optional(Auth::user());

        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }
        if ($request->session()->has('TYPECOMPTE') && $request->session()->get('TYPECOMPTE') == 'ges') {
            $semaine = Semaine::all();
            $hebergements = Hebergement::all();
            $utilisateurs = User::all();
            $reservations = Resa::query();

            if ($request->filled('semaine')) {
                $reservations->where('DATEDEBSEM', $request->input('semaine'));
            }

            if ($request->filled('id')) {
                $reservations->where('id', $request->input('id'));
            }

            if ($request->filled('NOHEB')) {
                $reservations->where('NOHEB', $request->input('NOHEB'));
            }

            $reservations = $reservations->get();


            return view('reservations.listReservations', compact('semaine', 'hebergements', 'reservations', 'utilisateurs'));
        } else {
            return redirect('/');
        }

    }

    public function reservationDetail(Request $request, $noresa)
    {
        $user = optional(Auth::user());

        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }
        if ($request->session()->has('TYPECOMPTE') && $request->session()->get('TYPECOMPTE') == 'ges') {
            $etat_resa = Etat_resa::all();

            $reservations = Resa::where('NORESA', $noresa)->first();

            return view('reservations.detailReservation', compact('reservations', 'etat_resa'));
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
    /*
     //sans faire un logement par utilisateur par semaine
    public function store(Request $request, $noheb)
    {
        // Récupération de l'utilisateur connecté
        $user = auth()->user();

        $validatedData = $request->validate([
            'semaine' => 'required',
            'NBOCCUPANT' => 'required|numeric',
        ]);

        $dateDebSem = Carbon::parse($validatedData['semaine']);

        $hebergement = Hebergement::where('noheb', $noheb)->first(); // Assurez-vous d'ajuster cela en fonction de votre modèle
        $tarifSemHeb = $hebergement->TARIFSEMHEB;

        $montantArrhes = $tarifSemHeb * 0.2;

        $reservation = new Resa([
            'DATEDEBSEM' => $dateDebSem,
            'NBOCCUPANT' => $validatedData['NBOCCUPANT'],
            'TARIFSEMRESA' => $tarifSemHeb, // Ajout du champ TARIFSEMRESA
            'MONTANTARRHES' => $montantArrhes, // Ajout du champ MONTANTARRHES
            'DATERESA' => Carbon::now(), // Ajout du champ DATERESA
        ]);

        $reservation->id = $user->id;

        $reservation->noheb = $noheb;
        $reservation->CODEETATRESA = 'AV';
        $reservation->save();

        return redirect()->route('index')->with('success', 'Location ajoutée avec succès');
    }
    */
    public function store(Request $request, $noheb)
    {
        $user = optional(Auth::user());

        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }

        if ($request->session()->has('TYPECOMPTE') && $request->session()->get('TYPECOMPTE') == 'ges' ||  $request->session()->get('TYPECOMPTE') == 'vac') {

            $user = auth()->user();

            $reservationExist = Resa::where('id', $user->id)
                ->where('DATEDEBSEM', $request->input('semaine'))
                ->exists();

            if ($reservationExist) {
                return redirect()->back()->with('error', 'Vous avez déjà réservé pour cette semaine un autre hébérgement.');
            }

            // verification des données du formulaire
            $validatedData = $request->validate([
                'semaine' => 'required',
                'NBOCCUPANT' => 'required|numeric',
            ]);

            $dateDebSem = Carbon::parse($validatedData['semaine']);

            $hebergement = Hebergement::where('noheb', $noheb)->first();
            $tarifSemHeb = $hebergement->TARIFSEMHEB;

            $montantArrhes = $tarifSemHeb * 0.2;

            $reservation = new Resa([
                'DATEDEBSEM' => $dateDebSem,
                'NBOCCUPANT' => $validatedData['NBOCCUPANT'],
                'TARIFSEMRESA' => $tarifSemHeb,
                'MONTANTARRHES' => $montantArrhes,
                'DATERESA' => Carbon::now(),
            ]);

            // lien avec l'utilisateur connecté
            $reservation->id = $user->id;

            $reservation->noheb = $noheb;
            $reservation->CODEETATRESA = 'AV';
            $reservation->save();

            return redirect()->route('index')->with([
                'success' => 'Location ajoutée avec succès',
                'reservationNumber' => $reservation->NORESA,
            ]);
        } else {
            return redirect('/');
        }
    }


    public function modificationReservation($noresa, Request $request)
    {
        $user = optional(Auth::user());

        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }
        if ($request->session()->has('TYPECOMPTE') && $request->session()->get('TYPECOMPTE') == 'ges' ) {
            // Charger les relations user et hebergement avec la réservation
            $reservation = Resa::with(['user', 'hebergement'])->where('NORESA', $noresa)->firstOrFail();
            $etat_resa = Etat_resa::all();

            $etat_actuel = $reservation->CODEETATRESA;

            return view('reservations.modificationReservation', compact('reservation', 'etat_resa', 'etat_actuel'));
        } else {
            return redirect('/');
        }
    }
    public function updateReservation(Request $request, $noresa)
    {
        $user = optional(Auth::user());

        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }

        if ($request->session()->has('TYPECOMPTE') && $request->session()->get('TYPECOMPTE') == 'ges' ) {
            $request->validate([
                'CODEETATRESA' => 'required',
            ]);

            $reservation = Resa::where('NORESA', $noresa)->firstOrFail();

            //$reservation->CODEETATRESA = $request->input('CODEETATRESA');
            if ($request->input('etat_actuel') != $request->input('CODEETATRESA')) {
                $reservation->CODEETATRESA = $request->input('CODEETATRESA');
                $reservation->save();
            }
            $reservation->save();

            return redirect()->route('reservationDetail', ['noresa' => $reservation->NORESA])
                ->with('success', 'Réservation mise à jour avec succès');
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
