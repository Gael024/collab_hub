<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadisticas</title>
</head>
<body>
    <h1>Estadisticas</h1>

    <h4>Proporción de usuarios por edad</h4>
    <canvas id="grafica_usuarios_edad"></canvas>

    <h4>Proporción de usuarios dado el tipo</h4>
    <canvas id="grafica_usuarios_tipo"></canvas>

    <h4>Proporción de usuarios dado el sector</h4>
    <canvas id="grafica_usuarios_sector"></canvas>

    <h4>Proporción de usuarios dada la institución de procedencia</h4>
    <canvas id="grafica_usuarios_procedencia"></canvas>

    <h4>Proporción de usuarios dado el país</h4>
    <canvas id="grafica_usuarios_pais"></canvas>

    <h4>Proporción de los medios que atraen más usuarios</h4>
    <canvas id="grafica_usuarios_referencia"></canvas>

    <h4>Caracteristica más importante para los usuarios</h4>
    <canvas id="grafica_usuarios_caracteristicas"></canvas>

    <h4>Caracteristica de mayor interes por tipo de usuario</h4>
    <canvas id="grafica_tipo_contra_caracteristica"></canvas>

    <h4>Forma en que se conocio la aplicación por tipo de usuario</h4>
    <canvas id="grafica_tipo_contra_referencias"></canvas>

    <a href="{{ route('administrador.inicio')}}"><button>Regresar al inicio</button></a>
    <a href="{{ route('administrador.usuarios')}}"><button>Ir al panel de usuarios</button></a>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    window.graficoData = {
        usuariosPorEdad: {!! json_encode($usuariosPorEdad) !!},
        usuariosPorTipo: {!! json_encode($usuariosPorTipo) !!},
        usuariosPorSector: {!! json_encode($usuariosPorSector) !!},
        usuariosPorProcedencia: {!! json_encode($usuariosPorProcedencia) !!},
        usuariosPorPais: {!! json_encode($usuariosPorPais) !!},
        usuariosPorReferencia: {!! json_encode($usuariosPorReferencia) !!},
        usuariosPorCaracteristica : {!! json_encode($usuariosPorCaracteristica) !!},
        radarCaracteristicas: {!! json_encode($radarCaracteristicas) !!},
        radarReferencias: {!! json_encode($radarReferencias) !!}
    };
</script>
 @vite(['resources/js/grafica.js'])

</body>
</html>