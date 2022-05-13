<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::get('home', [AdminController::class, 'index'])->name('admin-home');
    //gestion des utilisateurs
    Route::get('gestion_utilisateur', [UserController::class, 'liste_utilisateur'])->name('liste_utilisateur');
    Route::get('create_utilisateur', [UserController::class, 'create_utilisateur'])->name('create_utilisateur');
    Route::post('store_utilisateur', [UserController::class, 'store_utilisateur'])->name('store_utilisateur');
    Route::get('edit_utilisateur/{utilisateur_id}', [UserController::class, 'edit_utilisateur'])->name('edit_utilisateur');
    Route::post('update_utilisateur/{utilisateur_id}', [UserController::class, 'update_utilisateur'])->name('update_utilisateur');
    Route::get('delete_utilisateur/{utilisateur_id}', [UserController::class, 'delete_utilisateur'])->name('delete_utilisateur');

    //gestion des reclamations
    Route::get('liste_reclamations', [AdminController::class, 'getReclamations'])->name('liste_reclamations');
    Route::get('show_reclamation/{reclamation_id}', [AdminController::class, 'show_reclamation'])->name('admin_show_reclamation');
    Route::get('accepte_reclamation/{reclamation_id}', [AdminController::class, 'accepte_reclamation'])->name('accepte_reclamation');
});

//Authentification
Route::get('admin/login', [LoginController::class, 'adminLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'loginAdmin'])->name('admin-login');

Route::get('admin/register', [RegisterController::class, 'AdminRegisterForm'])->name('admin.register');
Route::post('admin/register', [RegisterController::class, 'createAdmin'])->name('admin-register');
