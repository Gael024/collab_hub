<div class="w-full max-w-6xl mx-auto">
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-indigo-600 text-white uppercase text-xs text-center font-bold">
                <tr>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Apellido</th>
                    <th class="px-4 py-3">Edad</th>
                    <th class="px-4 py-3">Tipo</th>
                    <th class="px-4 py-3">Sector</th>
                    <th class="px-4 py-3">Procedencia</th>
                    <th class="px-4 py-3">País</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Referencia</th>
                    <th class="px-4 py-3">Interés</th>
                    <th class="px-4 py-3">Correo</th>
                    <th class="px-4 py-3">Celular</th>
                    <th class="px-4 py-3">Fecha de registro</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50 transition text-center font-bold">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->apellido }}</td>
                    <td class="px-4 py-2">{{ $user->edad }}</td>
                    <td class="px-4 py-2">{{ $user->tipo }}</td>
                    <td class="px-4 py-2">{{ $user->sector }}</td>
                    <td class="px-4 py-2">{{ $user->procedencia }}</td>
                    <td class="px-4 py-2">{{ $user->pais }}</td>
                    <td class="px-4 py-2">{{ $user->estado }}</td>
                    <td class="px-4 py-2">{{ $user->referencia }}</td>
                    <td class="px-4 py-2">{{ $user->carac_principal }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ $user->celular }}</td>
                    <td class="px-4 py-2">{{ $user->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4 flex justify-center">
        {{ $users->links() }}
    </div>
</div>