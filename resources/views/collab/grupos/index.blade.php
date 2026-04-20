<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grupos</title>
</head>
<body>
    <h1>Grupos</h1>
    
    <div class="grupos">
        <div class="grupos_cabecera">
            <a href="/grupos/create">Crear grupo</a>
            <p>Buscar grupo</p>
            <div class="grupos_cuerpo">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Fecha de creación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grupos as $grupo)
                            <tr>
                                <td>{{ $grupo->id}}</td>
                                <td><a href="{{ route('grupos.show', $grupo->id) }}"> {{ $grupo->name }} </a></td>
                                <td>{{ $grupo->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>    
                </table>

            </div>
        </div>
    </div>
</body>
</html>