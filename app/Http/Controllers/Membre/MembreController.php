<?php

namespace App\Http\Controllers\Membre;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Actualite;


class MembreController extends Controller
{
   public function dashboard()
{
    $user = auth()->user();
    $nombreMembres = User::where('role', 'membre')->where('statut', 'valide')->count();
    $nombreActualites = Actualite::count();

    return view('membre.dashboard', compact('user', 'nombreMembres', 'nombreActualites'));
}

    public function profil()
    {
        return view('membre.profil', ['user' => auth()->user()]);
    }

    public function updateProfil(Request $request)
    {
        $user = auth()->user();

        $data = $request->validate([
            'prenom' => ['required', 'string', 'max:100'],
            'nom' => ['required', 'string', 'max:100'],
            'profession' => ['nullable', 'string', 'max:150'],
            'entreprise' => ['nullable', 'string', 'max:150'],
            'secteur_activite' => ['nullable', 'string', 'max:150'],
            'photo_profil' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($request->hasFile('photo_profil')) {
            $data['photo_profil'] = $request->file('photo_profil')->store('photos-profil', 'public');
        }

        $user->update($data);

        return back()->with('success', 'Ton profil a été mis à jour.');
    }

    public function annuaire(Request $request)
    {
        $query = User::where('role', 'membre')->where('statut', 'valide');

        if ($request->filled('recherche')) {
            $q = $request->recherche;
            $query->where(function ($sub) use ($q) {
                $sub->where('nom', 'like', "%{$q}%")
                    ->orWhere('prenom', 'like', "%{$q}%")
                    ->orWhere('entreprise', 'like', "%{$q}%");
            });
        }

        if ($request->filled('pays')) {
            $query->where('pays', $request->pays);
        }

        if ($request->filled('secteur')) {
            $query->where('secteur_activite', $request->secteur);
        }

        $membres = $query->latest()->get();
        $pays = User::where('role', 'membre')->where('statut', 'valide')->pluck('pays')->unique()->filter();
        $secteurs = User::where('role', 'membre')->where('statut', 'valide')->pluck('secteur_activite')->unique()->filter();

        return view('membre.annuaire', compact('membres', 'pays', 'secteurs'));
    }


    public function actualites()
{
    $actualites = Actualite::latest()->get();

    return view('membre.actualites', compact('actualites'));
}

    public function evenements()
    {
        // Le module Événements n'est pas encore développé — page prête à recevoir les données
        $evenements = [];

        return view('membre.evenements', compact('evenements'));
    }
}