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

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Tipo</th>
                <th>Sector</th>
                <th>Procedencia</th>
                <th>País</th>
                <th>Estado</th>
                <th>Referencia</th>
                <th>Interes</th>
                <th>Correo</th>
                <th>Celular</th>
                <th>Fecha de registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->apellido}}</td>
                <td>{{ $user->edad }}</td>
                <td>{{ $user->tipo }}</td>
                <td>{{ $user->sector}}</td>
                <td>{{ $user->procedencia }}</td>
                <td>{{ $user->pais}}</td>
                <td>{{ $user->estado}}</td>
                <td>{{ $user->referencia}}</td>
                <td>{{ $user->carac_principal}}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->celular}}</td>
                <td>{{ $user->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/">Volver</a>
</body>
</html>