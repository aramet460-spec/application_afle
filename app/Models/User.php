<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'prenom', 'nom', 'email', 'telephone', 'password',
        'pays', 'ville', 'profession', 'entreprise', 'secteur_activite',
        'photo_profil', 'role', 'statut',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // --- Rôles ---
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isMembre(): bool
    {
        return $this->role === 'membre';
    }

    // --- Statut de validation ---
    public function estValide(): bool
    {
        return $this->statut === 'valide';
    }

    public function estEnAttente(): bool
    {
        return $this->statut === 'en_attente';
    }

    // --- Utilitaire ---
    public function nomComplet(): string
    {
        return "{$this->prenom} {$this->nom}";
    }

    public function demandesFinancements()
{
    return $this->hasMany(DemandeFinancement::class);
}


}
