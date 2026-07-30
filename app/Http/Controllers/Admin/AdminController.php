<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $nombreMembres = User::where('role', 'membre')->count();
        $membresEnAttente = User::where('statut', 'en_attente')->count();

        // Ces modules n'existent pas encore dans la base — on les branchera plus tard
        $evenementsAVenir = [];
        $actualites = [];
        $opportunites = [];
        $notifications = [];

        return view('admin.dashboard', compact(
            'nombreMembres',
            'membresEnAttente',
            'evenementsAVenir',
            'actualites',
            'opportunites',
            'notifications'
        ));
    }

    public function membres()
    {
        $membres = User::where('role', 'membre')->latest()->get();

        return view('admin.membres', compact('membres'));
    }

    public function validerMembre(User $membre)
    {
        $membre->update(['statut' => 'valide']);

        return back()->with('success', $membre->nomComplet().' a été validé(e).');
    }

    public function refuserMembre(User $membre)
    {
        $membre->update(['statut' => 'refuse']);

        return back()->with('success', $membre->nomComplet().' a été refusé(e).');
    }
}