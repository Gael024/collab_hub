<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdministradorController extends Controller
{
    public function index(){
        $users = User::select(
        'id', 
        'name', 
        'email', 
        'rol', 
        'created_at', 
        'apellido', 
        'edad', 
        'celular', 
        'tipo', 
        'sector', 
        'procedencia', 
        'pais', 
        'estado', 
        'referencia', 
        'carac_principal')->get();
        return view('collab.administrador.usuarios', compact('users'));
    }
}
