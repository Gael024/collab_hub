<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            /*Validaciones para campos adicionales en el registro*/
            'apellido' =>['required', 'string', 'max:255'],
            'edad' => ['required', 'integer', 'min:14', 'max:80'],
            'celular' => ['required', 'string', 'size:10', 'regex:/[0-9]+$/'],
            'tipo' => ['required', 'in:estudiante,profesor,profesional'],
            'sector' => ['required', 'in:educacion,tecnologia,negocios,salud'],
            'procedencia' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'in:mexico,usa,espania,canada,brazil,china'],
            'estado' => ['required', 'string', 'max:255'],
            'referencia' => ['required', 'in:redes,amigos,anuncio,empresa'],
            'carac_principal' => ['required', 'in:presencia,chat,editor'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'apellido' => $request->apellido,
            'edad' => $request->edad,
            'celular' => $request->celular,
            'tipo' => $request->tipo,
            'sector' => $request->sector,
            'procedencia' => $request->procedencia,
            'pais' => $request->pais,
            'estado' => $request->estado,
            'referencia' => $request->referencia,
            'carac_principal' => $request->carac_principal,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
