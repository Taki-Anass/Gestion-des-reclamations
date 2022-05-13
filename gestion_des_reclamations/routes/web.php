<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReclamationController;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {

    Route::get('home', [UserController::class, 'index'])->name('home');
    //gestion des reclamations par l'utilisateur
    Route::get('gestion_reclamation', [ReclamationController::class, 'index'])->name('gestion_reclamation');
    Route::get('create_reclamation', [ReclamationController::class, 'create'])->name('create_reclamation');
    Route::post('store_reclamation', [ReclamationController::class, 'store'])->name('store_reclamation');
    Route::get('delete_reclamation/{reclamation_id}', [ReclamationController::class, 'destroy'])->name('delete_reclamation');
    Route::get('edit_reclamation/{reclamation_id}', [ReclamationController::class, 'edit'])->name('edit_reclamation');
    Route::post('update_reclamation/{reclamation_id}', [ReclamationController::class, 'update'])->name('update_reclamation');
    Route::get('show_reclamation/{reclamation_id}', [ReclamationController::class, 'show'])->name('show_reclamation');
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
