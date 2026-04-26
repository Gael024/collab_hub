<x-authlayout>
    <div class="max-w-6xl w-full space-y-12">
        <section class="text-center space-y-4">
            <h1 class="text-5xl font-extrabold text-indigo-700">Collab-Hub</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Collab-Hub integra comunicación en tiempo real, sincronización de datos y conciencia de grupo 
                en una arquitectura distribuida, permitiendo colaboración eficiente, escalable y desacoplada 
                entre múltiples usuarios y componentes.
            </p>
        </section>
        <section>
            <h2 class="text-2xl font-bold text-center mb-6">Núcleo del sistema</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                    <img src="{{ asset('images/img1.png') }}" 
                       class="w-full h-28 object-contain bg-gray-100 p-2">
                    <div class="p-4 text-center">
                        <h3 class="font-bold">Comunicación</h3>
                        <p class="text-sm text-gray-600">
                            Interacción en tiempo real entre usuarios.
                        </p>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                    <img src="{{ asset('images/img2.png') }}" 
                        class="w-full h-28 object-contain bg-gray-100 p-2">
                    <div class="p-4 text-center">
                        <h3 class="font-bold">Sincronización</h3>
                        <p class="text-sm text-gray-600">
                            Consistencia de datos en entornos distribuidos.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                    <img src="{{ asset('images/img3.png') }}" 
                       class="w-full h-28 object-contain bg-gray-100 p-2">
                    <div class="p-4 text-center">
                        <h3 class="font-bold">Group Awareness</h3>
                        <p class="text-sm text-gray-600">
                            Visibilidad de la actividad de los usuarios.
                        </p>
                    </div>
                </div>

            </div>
        </section>

        <!-- ARQUITECTURA -->
        <section class="space-y-4">
            <h2 class="text-2xl font-bold text-center">
                Arquitectura del sistema
            </h2>

            <div class="bg-white p-4 rounded-xl shadow text-center">
                <img src="{{ asset('images/img5.png') }}" 
                     class="w-full max-h-72 object-contain mx-auto">
            </div>

            <p class="text-center text-gray-600 text-sm max-w-2xl mx-auto font-bold">
                Componentes independientes con interfaces definidas como IComunicación e ISincronización,
                permitiendo ensamblaje flexible del sistema.
            </p>
        </section>

        <!-- CTA -->
        <section class="text-center">
            <a href="{{ route('register') }}" 
               class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition">
                Comenzar ahora
            </a>
        </section>

    </div>
</x-authlayout>