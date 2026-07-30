<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Affiche le formulaire d'inscription
    public function create()
    {
        return view('auth.register');
    }

    // Traite le formulaire et enregistre en base de données
    public function store(Request $request)
    {
        $data = $request->validate([
            'prenom' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'telephone' => 'required|string|max:20|unique:users,telephone',
            'email' => 'required|email|max:255|unique:users,email',
            'pays' => 'required|string|max:100',
            'ville' => 'required|string|max:100',
            'profession' => 'nullable|string|max:150',
            'entreprise' => 'nullable|string|max:150',
            'secteur_activite' => 'nullable|string|max:150',
            'photo_profil' => 'nullable|image|max:2048',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($request->hasFile('photo_profil')) {
            $data['photo_profil'] = $request->file('photo_profil')->store('photos-profil', 'public');
        }

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'membre';
        $data['statut'] = 'en_attente';

        User::create($data);

        return redirect('/inscription')->with('success', 'Inscription réussie !');
    }
}