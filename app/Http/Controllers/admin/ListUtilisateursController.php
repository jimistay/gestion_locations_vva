<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListUtilisateursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //utilisateur authentifié
        $user = optional(Auth::user());

        // Stocker TYPECOMPTE
        if (Auth::user()) {
            $request->session()->put('TYPECOMPTE', $user->TYPECOMPTE);
        }
        // Vérification de TYPECOMPTE
        if ($request->session()->has('TYPECOMPTE') && $request->session()->get('TYPECOMPTE') == 'adm') {
            $users = User::all();
            return view('admin.listUtilisateurs', compact('users'));
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
