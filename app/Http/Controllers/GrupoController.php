<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\User;
use App\Models\Mensaje;
use App\Models\Documento;
use Illuminate\Support\Facades\Auth;
use App\Events\MensajeEnviado;
use App\Events\DocumentoActualizado;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class GrupoController extends Controller
{    use AuthorizesRequests; //Permite usar el método authorize()
       //Lista de grupos 
    public function index(){
        $grupos  = Auth::user()->grupos;
        return view('collab.grupos.index', compact('grupos'));
    }
    
    //Formulario de creación
    public function create(){
        return view('collab.grupos.create');
    }
    
    //Guardar grupo
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        $grupo = Grupo::create([
            'name' => $request->name,
            'id_propietario' =>Auth::id()

        ]);

        Documento::create([
            'grupo_id' => $grupo->id,
            'contenido' => ''
        ]);

        $grupo->users()->attach(Auth::id(), ['rol' => 'admin']);

        return redirect('/grupos');

    }
    //Vista individual; carga de ID y usuarios   
    public function show($id){
        $grupo = Grupo::with(['users', 'mensajes.user', 'documento'])->findOrfail($id);
        return view('collab.grupos.show', compact('grupo'));
    }
    
    //Agregar usuarios a grupos de trabajo
    public function addUser(Request $request, $id){
        $grupo = Grupo::findOrFail($id);
        //Uso de p0olitica para limitar el uso de la función addUser
        $this->authorize('addUser', $grupo); //

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return back()->with('error', 'El usuario no existe');
        }

        if($grupo->users->contains($user->id)){
            return back()->with('error','El usuario ya está en el grupo');
 
        }
        $grupo->users()->attach($user->id);

        return back()->with('success', 'Usuario agregado correctamente');
    }

    public function removeUser($grupoId, $userId){
        $grupo = Grupo::findOrFail($grupoId);

        $this->authorize('removeUser', $grupo);

        if($userId == $grupo->id_propietario) {
            return back()->with('error', 'El propietario del grupo no puede ser eliminado');
        }

        $grupo->users()->detach($userId);
        return back()->with('success', 'Usuario eliminado');
    }

    public function storeMensaje(Request $request, $id){
        $request->validate([
            'contenido' => 'required|string'
        ]);

        $mensaje = Mensaje::create([
            'grupo_id' => $id,
            'user_id' => Auth::id(),
            'contenido' => $request->contenido
        ]);
        
        broadcast(new MensajeEnviado($mensaje))->toOthers();
        //broadcast(new MensajeEnviado($mensaje));
        return back();

    }

    //Actualizar editor compartido
    public function updateDocumento(Request $request, $id){
        $request->validate([
            'contenido' => 'nullable|string'
        ]);
        $grupo = Grupo::findOrFail($id);
        $grupo->documento->update([
            'contenido' => $request->contenido
        ]);
        
        broadcast(new DocumentoActualizado($grupo->documento));
        return response()->json(['status' => 'ok']);
        return back();
    }
}
