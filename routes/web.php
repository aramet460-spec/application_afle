<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Membre\MembreController;
use App\Http\Controllers\Admin\ActualiteController;


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
});

Route::middleware('auth')->prefix('espace-membre')->name('membre.')->group(function () {
    Route::get('/', [MembreController::class, 'dashboard'])->name('dashboard');
    Route::get('/actualites', [MembreController::class, 'actualites'])->name('actualites');
    
    Route::get('/financement', [DemandeFinancementController::class, 'index'])->name('financement.index');
    Route::get('/financement/nouvelle', [DemandeFinancementController::class, 'create'])->name('financement.create');
    Route::post('/financement', [DemandeFinancementController::class, 'store'])->name('financement.store');

});