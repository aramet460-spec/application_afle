<?php

namespace App\Http\Controllers\Membre;

use App\Http\Controllers\Controller;
use App\Models\DemandeFinancement;
use Illuminate\Http\Request;

class DemandeFinancementController extends Controller
{
    public function index()
    {
        $demandes = auth()->user()->demandesFinancements()->latest()->get();

        return view('membre.financement.index', compact('demandes'));
    }

    public function create()
    {
        return view('membre.financement.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'montant' => ['required', 'numeric', 'min:1'],
            'piece_identite' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:4096'],
            'certificat_domicile' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:4096'],
            'casier_judiciaire' => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:4096'],
        ]);

        $data['user_id'] = auth()->id();
        $data['piece_identite'] = $request->file('piece_identite')->store('financement/pieces-identite', 'public');
        $data['certificat_domicile'] = $request->file('certificat_domicile')->store('financement/certificats-domicile', 'public');
        $data['casier_judiciaire'] = $request->file('casier_judiciaire')->store('financement/casiers-judiciaires', 'public');

        DemandeFinancement::create($data);

        return redirect()->route('membre.financement.index')->with('success', 'Ta demande de financement a été envoyée.');
    }
}