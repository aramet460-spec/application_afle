<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Membre\MembreController;
use App\Http\Controllers\Admin\ActualiteController;
use App\Http\Controllers\Membre\DemandeFinancementController as MembreDemandeFinancementController;
use App\Http\Controllers\Admin\DemandeFinancementController as AdminDemandeFinancementController;


//Route::get('/', function () {
    //return view('welcome');
//});

Route::post('/deconnexion', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/connexion');
})->name('logout')->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/inscription', [RegisterController::class, 'create'])->name('register');
Route::post('/inscription', [RegisterController::class, 'store']);

Route::get('/connexion', [LoginController::class, 'create'])->name('login');
Route::post('/connexion', [LoginController::class, 'store']);

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/membres', [AdminController::class, 'membres'])->name('membres');

    Route::post('/membres/{membre}/valider', [AdminController::class, 'validerMembre'])->name('membres.valider');
    Route::post('/membres/{membre}/refuser', [AdminController::class, 'refuserMembre'])->name('membres.refuser');

Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualites.index');
Route::get('/actualites/creer', [ActualiteController::class, 'create'])->name('actualites.create');
Route::post('/actualites', [ActualiteController::class, 'store'])->name('actualites.store');
Route::delete('/actualites/{actualite}', [ActualiteController::class, 'destroy'])->name('actualites.destroy');

Route::get('/financement', [AdminDemandeFinancementController::class, 'index'])->name('financement.index');
    Route::get('/financement/{demande}', [AdminDemandeFinancementController::class, 'show'])->name('financement.show');
    Route::post('/financement/{demande}/repondre', [AdminDemandeFinancementController::class, 'repondre'])->name('financement.repondre');
});

Route::middleware('auth')->prefix('espace-membre')->name('membre.')->group(function () {
    Route::get('/', [MembreController::class, 'dashboard'])->name('dashboard');
    Route::get('/actualites', [MembreController::class, 'actualites'])->name('actualites');
    Route::get('/profil', [MembreController::class, 'profil'])->name('profil');
    Route::post('/profil', [MembreController::class, 'updateProfil'])->name('profil.update');

    Route::get('/financement', [MembreDemandeFinancementController::class, 'index'])->name('financement.index');
    Route::get('/financement/nouvelle', [MembreDemandeFinancementController::class, 'create'])->name('financement.create');
    Route::post('/financement', [MembreDemandeFinancementController::class, 'store'])->name('financement.store');
});