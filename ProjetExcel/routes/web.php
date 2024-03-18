<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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


Route::get('/client',[ClientController::class, 'liste_client']);
Route::get('/ajouter',[ClientController::class, 'ajouter_client']);
Route::post('/ajouter/traitement',[ClientController::class, 'ajouter_client_traitement']);
// Route::get('/exportExcel',[ClientController::class, 'export']);


