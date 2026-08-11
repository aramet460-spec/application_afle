<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemandeFinancement;
use Illuminate\Http\Request;

class DemandeFinancementController extends Controller
{
    public function index()
    {
        $demandes = DemandeFinancement::with('membre')->latest()->get();

        return view('admin.financement.index', compact('demandes'));
    }

    public function show(DemandeFinancement $demande)
    {
        $demande->load('membre');

        return view('admin.financement.show', compact('demande'));
    }

    public function repondre(Request $request, DemandeFinancement $demande)
    {
        $data = $request->validate([
            'statut' => ['required', 'in:approuve,refuse'],
            'reponse_admin' => ['nullable', 'string', 'max:1000'],
        ]);

        $demande->update($data);

        return redirect()->route('admin.financement.index')->with('success', 'Réponse envoyée au membre.');
    }
}