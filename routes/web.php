<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\AdministradorController;

Route::get('/', function () {
    return view('welcome');
});

//Rutas para 'grupos'
Route::middleware(['auth'])->group(function () {
    Route::get('/grupos', [GrupoController::class, 'index'])->name('grupos.index');
    Route::get('/grupos/create', [GrupoController::class, 'create']);
    Route::post('/grupos', [GrupoController::class, 'store']);
   
});

//Ruta para vista de grupo individual
Route::get('/grupos/{id}', [GrupoController::class, 'show'])->name('grupos.show');

//Ruta para agregar usuarios
Route::post('/grupos/{id}/agregar_usuario', [GrupoController::class, 'addUser'])->name('grupos.addUser');

//Ruta para envio de mensajes
Route::post('/grupos/{id}/mensajes', [GrupoController::class, 'storeMensaje'])->name('grupos.mensajes.store');

//Ruta para editor compartido
Route::post('/grupos/{id}/documento', [GrupoController::class, 'updateDocumento'])->name('documentos.update');

//Ruta para administrador
/*
Route::middleware(['auth', 'administrador'])->group(function () {
    Route::get('/administrador/usuarios', [AdministradorController::class, 'index'])->name('administrador.usuarios');
});

Route::middleware(['auth', 'redirect.role'])->group(function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    });
});
*/
Route::middleware(['auth', 'administrador'])->group(function () {
    Route::get('/administrador/usuarios', [AdministradorController::class, 'index']);
    Route::get('/administrador/dashboard', [AdministradorController::class, 'index']);
    Route::get('/administrador/estadisticas', [AdministradorController::class, 'estadisticas']);
    });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'redirect.role'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
