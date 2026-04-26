<x-authlayout>
    <div style="display:flex; gap:30px; justify-content:center; margin-top:50px;">

        <a href="{{ route('administrador.usuarios') }}" style="text-decoration:none;">
            <div style="text-align:center;">
                <img src="{{ asset('images/img6.png') }}"
                     alt="Usuarios"
                     style="width:350px; height:220px; object-fit:cover; border-radius:14px; box-shadow:0 6px 15px rgba(0,0,0,0.25);">
                <p style="margin-top:12px; font-weight:bold; font-size:18px;">Panel de usuarios</p>
            </div>
        </a>

        <a href="{{ route('administrador.estadisticas') }}" style="text-decoration:none;">
            <div style="text-align:center;">
                <img src="{{ asset('images/img7.png') }}"
                     alt="Estadísticas"
                     style="width:350px; height:220px; object-fit:cover; border-radius:14px; box-shadow:0 6px 15px rgba(0,0,0,0.25);">
                <p style="margin-top:12px; font-weight:bold; font-size:18px;">Ver estadísticas</p>
            </div>
        </a>

    </div>
</x-authlayout>