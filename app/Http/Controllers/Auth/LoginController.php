<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'identifiant' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // On détecte si l'identifiant est un email ou un téléphone
        $champ = filter_var($request->identifiant, FILTER_VALIDATE_EMAIL) ? 'email' : 'telephone';

        if (!Auth::attempt([$champ => $request->identifiant, 'password' => $request->password])) {
            return back()->withErrors(['identifiant' => 'Identifiants incorrects.'])->onlyInput('identifiant');
        }

        $user = Auth::user();

        if ($user->statut !== 'valide') {
            Auth::logout();
            return back()->withErrors(['identifiant' => 'Votre compte est en attente de validation par un administrateur.']);
        }

        $request->session()->regenerate();

        return $user->isAdmin()
            ? redirect()->route('admin.dashboard')
            : redirect('/');
    }
}