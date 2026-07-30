<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('prenom')->after('id');
            $table->string('nom')->after('prenom');
            $table->string('telephone')->unique()->after('email');
            $table->string('pays');
            $table->string('ville');
            $table->string('profession')->nullable();
            $table->string('entreprise')->nullable();
            $table->string('secteur_activite')->nullable();
            $table->string('photo_profil')->nullable();
            $table->enum('role', ['admin', 'membre'])->default('membre');
            $table->enum('statut', ['en_attente', 'valide', 'refuse'])->default('en_attente');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'prenom', 'nom', 'telephone', 'pays', 'ville',
                'profession', 'entreprise', 'secteur_activite',
                'photo_profil', 'role', 'statut',
            ]);
        });
    }
};