<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    
</head>
<body>
    <h2>Usuarios en el sistema</h2>

    <form method="GET" action="{{ url()->current() }}">
        <input type="text" name="search" placeholder="Nombre o correo" value="{{ request('search') }}"> 

        <select name="tipo">
            <option value="">Tipo</option>
            <option value="estudiante" {{ request('tipo') =='estudiante' ? 'selected' : '' }}>Estudiante</option>
            <option value="profesor" {{ request('tipo') =='profesor' ? 'selected' : '' }}>Profesor</option>
            <option value="profesional" {{ request('tipo') =='profesional' ? 'selected' : '' }}>Profesional</option>
        </select>

        <select name="sector">
            <option value="">Sector</option>
            <option value="educacion" {{ request('sector')== 'educacion' ? 'selected' : '' }}>Educación</option>
            <option value="tecnologia" {{ request('sector')== 'tecnologia' ? 'selected' : '' }}>Tecnología</option>
            <option value="negocios" {{ request('sector')== 'negocios' ? 'selected' : '' }}>Negocios</option>
            <option value="salud" {{ request('sector')== 'salud' ? 'selected' : '' }}>Salud</option>            
        </select>

        <select name="pais">
            <option value="">Pais</option>
            <option value="mexico"{{ request('pais') == 'mexico' ? 'selected' : '' }}>México</option>
            <option value="usa"{{ request('pais') == 'usa' ? 'selected' : '' }}>USA</option>
            <option value="espania"{{ request('pais') == 'espania' ? 'selected' : '' }}>España</option>
            <option value="canada"{{ request('pais') == 'canada' ? 'selected' : '' }}>Canada</option>
            <option value="brazil"{{ request('pais') == 'brazil' ? 'selected' : '' }}>Brazil</option>
            <option value="china"{{ request('pais') == 'china' ? 'selected' : '' }}>China</option>
        </select>

        <select name="referencia">
            <option value="">Referencia</option>
            <option value="redes" {{ request('referencia') == 'redes' ? 'selected' : '' }}>Redes</option>
            <option value="amigos" {{ request('referencia') == 'amigos' ? 'selected' : '' }}>Amigos</option>
            <option value="anuncio" {{ request('referencia') == 'anuncio' ? 'selected' : '' }}>Anuncio</option>
            <option value="empresa" {{ request('referencia') == 'empresa' ? 'selected' : '' }}>Empresa</option>
        </select>

        <select name="carac_principal">
            <option value="">Interes</option>
            <option value="presencia" {{ request('carac_principal') == 'presencia' ? 'selected' : '' }}>Presencia</option>
            <option value="chat" {{ request('carac_principal') == 'chat' ? 'selected' : '' }}>Chat</option>
            <option value="editor" {{ request('carac_principal') == 'editor' ? 'selected' : '' }}>Editor</option>
        </select>

        
        <button><a href="{{ url()->current() }}">Limpiar</a></button>
    </form>

    
    <div id="tabla_usuarios">
        @include('collab.administrador.parcial.panel')
    </div>

    <a href="{{ route('administrador.inicio') }}"><button>Regresar al inicio</button></a>
    <a href="{{ route('administrador.estadisticas') }}"><button>Ver estadisticas</button></a>

    
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const tabla = document.getElementById('tabla_usuarios');

    function cargarUsuarios(){
        const formData = new FormData(form);
        const params = new URLSearchParams(formData).toString();
        const url = window.location.pathname + '?' + params;
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.text())
        .then(html => {
            tabla.innerHTML = html;
            window.history.replaceState(null, '', url);
        });
    }

    form.search.addEventListener('keyup', function(){
        cargarUsuarios();
    });

    form.tipo.addEventListener('change', cargarUsuarios);
    form.sector.addEventListener('change', cargarUsuarios);
    form.pais.addEventListener('change', cargarUsuarios);
    form.referencia.addEventListener('change', cargarUsuarios);
    form.carac_principal.addEventListener('change', cargarUsuarios);
})
</script>    
</body>
</html>