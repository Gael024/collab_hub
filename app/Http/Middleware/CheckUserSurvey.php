<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSurvey
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $needsSurvey = is_null($user->sector) ||
                       is_null($user->tipo) ||
                       is_null($user->referencia) ||
                       is_null($user->carac_principal) ||
                       is_null($user->grado_academico) ||
                       is_null($user->procedencia);

        if ($needsSurvey && !$request->routeIs('encuesta*')) {
            return redirect()->route('encuesta');
        }
        return $next($request);
    }
}
