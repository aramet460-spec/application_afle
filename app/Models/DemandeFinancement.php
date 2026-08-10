<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeFinancement extends Model
{
    protected $fillable = [
        'user_id', 'montant', 'piece_identite', 'certificat_domicile', 'casier_judiciaire',
        'statut', 'reponse_admin',
    ];

    public function membre()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}