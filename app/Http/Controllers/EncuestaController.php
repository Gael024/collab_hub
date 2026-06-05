<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EncuestaController extends Controller
{
    public function index() {
        $user = Auth::user();
        $needsSurvey = is_null($user->sector) ||
                       is_null($user->tipo) ||
                       is_null($user->referencia) ||
                       is_null($user->carac_principal) ||
                       is_null($user->grado_academico) ||
                       is_null($user->procedencia);

    
        if(!$needsSurvey) {
            return redirect()->route('dashboard');
        }
        return view('encuesta');
    }

    public function store(Request $request){
        $request->validate([
            'sector' => ['required', 'in:educacion,tecnologia,negocios,salud'],
            'tipo' => ['required', 'in:estudiante,profesor,profesional'],
            'referencia' => ['required', 'in:redes,amigos,anuncio,empresa'],
            'carac_principal' => ['required', 'in:presencia,chat,editor'],
            'grado_academico' => ['required', 'in:preparatoria,licenciatura,maestria,doctorado'],
            'procedencia' => ['required', 'string', 'max:255'],
        ]);
        
        $user = Auth::user();
   \Log::info('Antes de asignar - tipo actual: ' . $user->tipo);
    \Log::info('Valor recibido para tipo: ' . $request->tipo);
    
    $user->sector = $request->sector;
    $user->tipo = $request->rol;
    $user->referencia = $request->referencia;
    $user->carac_principal = $request->carac_principal;
    $user->grado_academico = $request->grado_academico;
    $user->procedencia = $request->procedencia;
    
    \Log::info('Después de asignar - tipo antes de save: ' . $user->tipo);

    $result = $user->save();
     \Log::info('Después de save - tipo: ' . $user->fresh()->tipo);
        
        
        return redirect()->route('dashboard');
    }
}
