<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    public function index(Request $request){
        $query = User::query();

        //Usuario por nombre o correo
        if($request->filled('search')){
            $query->where(function($q) use ($request){
                $q->where('name', 'ILIKE', '%' . $request->search . '%')
                ->orwhere('email', 'ILIKE', '%' . $request->search . '%');
            });
        }

        //Filtrar usuarios por tipo
        if($request->filled('tipo')){
            $query->where('tipo', $request->tipo);
        }

        //Filtrar usuarios por sector
        if($request->filled('sector')){
            $query->where('sector', $request->sector);
        }

        //Filtrar usuarios por pais
        if($request->filled('pais')){
            $query->where('pais', $request->pais);
        }

        //Filtrar usuarios por referencia
        if($request->filled('referencia')){
            $query->where('referencia', $request->referencia);
        }

        //Fultrar usuarios por interes
        if($request->filled('carac_principal')){
            $query->where('carac_principal', $request->carac_principal);
        }

        $users = $query->paginate(30)->withQueryString();


        return view('collab.administrador.usuarios', compact('users',));
    }

    public function estadisticas(){

    
        //Usuarios agrupados por edad
        $usuariosPorEdad = User::select(
            DB::raw("
             CASE
                 WHEN edad BETWEEN 14 AND 24 THEN '14-24'
                 WHEN edad BETWEEN 25 AND 35 THEN '25-35'
                 WHEN edad BETWEEN 36 AND 45 THEN '36-45'
                 WHEN edad >= 46 THEN '+ 45'
             END AS rango_edad 
            "),
            DB::raw('COUNT(*) AS total'))
            ->groupBy(DB::raw("
            CASE
                 WHEN edad BETWEEN 14 AND 24 THEN '14-24'
                 WHEN edad BETWEEN 25 AND 35 THEN '25-35'
                 WHEN edad BETWEEN 36 AND 45 THEN '36-45'
                 WHEN edad >= 46 THEN '+ 45'
             END 
            "))
            ->orderByRaw('MIN(edad)')
            ->get();

        //Proporción de usuarios dado su tipo
        $usuariosPorTipo = User::select('tipo', DB::raw('COUNT(*) as total_usuarios_tipo'))
        ->groupBy('tipo')
        ->get();

        //Proporción de usuarios dado el sector
        $usuariosPorSector = User::select('sector', DB::raw('COUNT(*) as total_usuarios_sector'))
        ->groupBy('sector')
        ->get();

        //Proporción de usuarios dado la empresa/institución de procedencia
        $usuariosPorProcedencia = User::select('procedencia', DB::raw('COUNT(*) as total_usuarios_procedencia'))
        ->groupBy('procedencia')
        ->get();

        //Proporción de usuarios dado el país
        $usuariosPorPais = User::select('pais', DB::raw('COUNT(*) as total_usuarios_pais'))
        ->groupBy('pais')
        ->get();

        //Analisis-Referencia que atrae mas ususarios
        $usuariosPorReferencia = User::select('referencia', DB::raw('COUNT(*) as total_usuarios_referencia'))
        ->groupBy('referencia')
        ->get();

        //Analisis-Caracteristica más impotante
        $usuariosPorCaracteristica = User::select('carac_principal', DB::raw('COUNT(*) as total_usuarios_caracteristica'))
        ->groupBy('carac_principal')
        ->get();

        //Analisis-que tipo de usuario se ineteresa por cada caracteristica
        $usuariosTipoCaracteristica = User::select('tipo', 'carac_principal', DB::raw('COUNT(*) as total_tipo_caracteristica'))
        ->whereNotNull('tipo')
        ->whereNotNull('carac_principal')
        ->groupBy('tipo', 'carac_principal')
        ->get();
        
        //Analisis-que tipo de usuario conocio el software por determinado medio
        $usuariosTipoReferencia = User::select('tipo', 'referencia', DB::raw('COUNT(*) as total_tipo_referencia'))
        ->whereNotNull('tipo')
        ->whereNotNull('referencia')
        ->groupBy('tipo', 'referencia')
        ->get();

        //Transformación de datos para uso en radar

        $conversionNombres = [
            'presencia' => 'Gestor de presencia',
            'chat' => 'Chat en tiempo real',
            'editor' => 'Editor compartido'
        ];

        $radarCaracteristicas = [
            'labels' => array_values($conversionNombres),
            'datasets' => []
        ];

        $tiposUsuario = User::whereNotNull('tipo')->distinct()->pluck('tipo');
        foreach ($tiposUsuario as $tipo) {
            $dataset = [
                'label' => ucfirst($tipo),
                'data' => [],
                'fill' => true
                //'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                //'pointBackgroundColor' => 'rgba(54, 162, 235, 1)',
                //'pointHoverBorderColor' => 'rgba(54, 162, 235, 1)'
            ];

            foreach($conversionNombres as $valorReal => $textoMostrar){
                $valor = $usuariosTipoCaracteristica
                ->where('tipo', $tipo)
                ->where('carac_principal', $valorReal)
                ->first();

                $dataset['data'][] = $valor ? $valor->total_tipo_caracteristica : 0;
            }

            $radarCaracteristicas['datasets'][] = $dataset;
        }

        // Transformacion - segundo radar
        $conversionNombresReferencias = [
            'redes' => 'Redes sociales',
            'amigos' => 'Amigos',
            'anuncio' => 'Anuncios',
            'empresa' => 'Mi empresa usa el software'
        ];

        $radarReferencias = [
            'labels' => array_values($conversionNombresReferencias),
            'datasets' => []
        ];

        foreach($tiposUsuario as $tipo){
            $dataset = [
                'label' => ucfirst($tipo),
                'data' => [],
                'fill' => true
                //'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                //'borderColor' => 'rgba(75, 192, 192, 1)',
                //'pointBackgroundColor' => 'rgba(54, 162, 235, 1)',
                //'pointBorderColor' => '#fff',
                //'pointHoverBackgroundColor' => '#fff',
                //'pointHoverBorderColor' => 'rgba(54, 162, 235, 1)',
            ];

            foreach($conversionNombresReferencias as $valorReal => $textoMostrar){
                $valor = $usuariosTipoReferencia
                ->where('tipo', $tipo)
                ->where('referencia', $valorReal)
                ->first();

                $dataset['data'][] = $valor ? $valor->total_tipo_referencia : 0;
            }

            $radarReferencias['datasets'][] = $dataset;
        }



        return view('collab.administrador.estadisticas', compact(
            'usuariosPorEdad',
            'usuariosPorTipo',
            'usuariosPorSector',
            'usuariosPorProcedencia',
            'usuariosPorPais',
            'usuariosPorReferencia',
            'usuariosPorCaracteristica',
            'radarCaracteristicas',
            'radarReferencias'
            ));

    }
}
