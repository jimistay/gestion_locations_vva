<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Hebergement;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\admin\ListUtilisateursController;
use App\Http\Controllers\gestionnaire\GestionHebergementsController;
use App\Http\Controllers\reservation\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'preventBackAfterLogout'], function () {
//route pour visualiser les gestionnaires et vacanciers par l'administrateur
    Route::get('/list-utilisateurs', [ListUtilisateursController::class, 'index'])->name('list-utilisateurs')->middleware('auth');

//routes pour la gestion d'un hébergement
    Route::get('ajouter-un-hebergement', [GestionHebergementsController::class, 'index'])->name('ajouter-un-hebergement')->middleware('auth');
    Route::post('ajouter-un-hebergement', [GestionHebergementsController::class, 'store'])->name('hebergements.store')->middleware('auth');
    Route::get('modifier-hebergement/{noheb}', [GestionHebergementsController::class, 'edit'])->name('modifier-hebergement')->middleware('auth');
    Route::put('modifier-hebergement/{noheb}', [GestionHebergementsController::class, 'update'])->middleware('auth');

//routes pour la gestion des réservations
    Route::get('{noheb}/reservation', [ReservationController::class, 'index'])->name('reservation')->middleware('auth');
    Route::post('{noheb}/reservation/store', [ReservationController::class, 'store'])->name('reservation.store')->middleware('auth');
    //modifier une reservation
    Route::get('modificationReservation/{noresa}', [ReservationController::class, 'modificationReservation'])->name('modificationReservation')->middleware('auth');
    Route::patch('/update-reservation/{noresa}', [ReservationController::class, 'updateReservation'])->name('updateReservation')->middleware('auth');
    //lister les reservations
    Route::get('/reservations', [ReservationController::class, 'listReservations'])->name('reservations')->middleware('auth');
    Route::get('/reservations/{noresa}', [ReservationController::class, 'reservationDetail'])->name('reservationDetail')->middleware('auth');

});


//routes accès à tous
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/logement/{noheb}', [IndexController::class, 'logementDetail'])->name('logementDetail');

//routes connexion et déconnexion
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/login', [AuthController::class, 'logout'])->name('auth.logout');

