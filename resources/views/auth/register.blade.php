<x-auth-layout>
    <div class="w-full max-w-4xl bg-white shadow-xl rounded-xl p-10">
        <h2 class="text-3xl font-bold mb-8 text-gray-800">Crear cuenta</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')"  class="mt-2 text-red-600 font-semibold" />
                    </div>
                
                <!-- Apellidos -->
                <div>
                    <x-input-label for="apellido" value="Apellidos" />
                    <x-text-input id="apellido" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="apellido" :value="old('apellido')" required autocomplete="apellido" />
                    <x-input-error :messages="$errors->get('apellido')" class="mt-2 text-red-600 font-semibold" />
                </div>
                <!-- Edad -->
                <!--
                <div>
                    <x-input-label for="edad" value="Edad" />
                    <x-text-input id="edad" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="number" name="edad" :value="old('edad')" required autocomplete="edad" />
                    <x-input-error :messages="$errors->get('edad')" class="mt-2 text-red-600 font-semibold"/>
                </div>
                -->
                <!-- Telefono -->
                <div>
                    <x-input-label for="celular" value="Número telefonico" />
                    <x-text-input id="celular" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="tel" name="celular" :value="old('celular')" required autocomplete="celular" />
                    <x-input-error :messages="$errors->get('celular')"  class="mt-2 text-red-600 font-semibold" />
                </div>
                <!-- Pais-->
                <!--
                <div>
                    <x-input-label for="pais" value="País" />
                    <select id="pais" name="pais" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Seleccione su país</option>
                        <option value="mexico" {{ old('pais') == 'mexico' ? 'selected' : '' }}>México</option>
                        <option value="usa" {{ old('pais') == 'usa' ? 'selected' : '' }}>Estados Unidos</option>
                        <option value="espania" {{ old('pais') == 'espania' ? 'selected' : '' }}>España</option>
                        <option value="canada" {{ old('pais') == 'canada' ? 'selected' : '' }}>Canadá</option>
                        <option value="brazil" {{ old('pais') == 'brazil' ? 'selected' : '' }}>Brazil</option>
                        <option value="china" {{ old('pais') == 'china' ? 'selected' : '' }}>China</option>
                    </select>
                    <x-input-error :messages="$errors->get('pais')" class="mt-2 text-red-600 font-semibold" />
                </div>
            -->
                <!-- Estado -->
                <!--
                <div>
                    <x-input-label for="estado" value="Estado en el que reside" />
                    <x-text-input id="estado" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="estado" :value="old('estado')" required autocomplete="estado" />
                    <x-input-error :messages="$errors->get('estado')" class="mt-2 text-red-600 font-semibold" />
                </div>
            -->
                <!-- Rol -->
                <!--
                <div>
                    <x-input-label for="tipo" value="Rol" />
                    <select id="tipo" name="tipo" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Selecciona el rol que desempeñas</option>
                        <option value="estudiante" {{ old('tipo') == 'estudiante' ? 'selected' : '' }}>Estudiante</option>
                        <option value="profesor" {{ old('tipo') == 'profesor' ? 'selected' : '' }}>Profesor</option>
                        <option value="profesional" {{ old('tipo') == 'profesional' ? 'selected' : '' }}>Profesional</option>
                    </select>
                    <x-input-error :messages="$errors->get('tipo')" class="mt-2 text-red-600 font-semibold" />
                </div>
            -->
                <!-- Sector-->
                <!--
                <div >
                    <x-input-label for="sector" value="Sector" />
                    <select id="sector" name="sector" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Selecciona el sector al que pertenece</option>
                        <option value="educacion" {{ old('sector') == 'educacion' ? 'selected' : '' }}>Educación</option>
                        <option value="tecnologia" {{ old('sector') == 'tecnologia' ? 'selected' : '' }}>Tecnología</option>
                        <option value="negocios" {{ old('sector') == 'negocios' ? 'selected' : '' }}>Negocios</option>
                        <option value="salud" {{ old('sector') == 'salud' ? 'selected' : '' }}>Salud</option>
                    </select>
                    <x-input-error :messages="$errors->get('sector')"  class="mt-2 text-red-600 font-semibold" />
                </div>
            -->
                <!-- Procedencia-->
                <!--
                <div class="md:col-span-2">
                    <x-input-label for="procedencia" value="Indique la institución o empresa a la que pertenece" />
                    <x-text-input id="procedencia" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="text" name="procedencia" :value="old('procedencia')" required autocomplete="procedencia" />
                    <x-input-error :messages="$errors->get('procedencia')" class="mt-2 text-red-600 font-semibold" />
                </div>
            -->
                <!-- Referencia-->
                <!--
                <div>
                    <x-input-label for="referencia" value="¿Cómo nos conociste?" />
                    <select id="referencia" name="referencia" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Selecciona la opción que mejor lo describa</option>
                        <option value="redes" {{ old('referencia') == 'redes' ? 'selected' : '' }}>Los conocí por redes sociales</option>
                        <option value="amigos" {{ old('referencia') == 'amigos' ? 'selected' : '' }}>Un amigo me habló de la aplicación</option>
                        <option value="anuncio" {{ old('referencia') == 'anuncio' ? 'selected' : '' }}>Ví un anuncio de ustedes</option>
                        <option value="empresa" {{ old('referencia') == 'empresa' ? 'selected' : '' }}>Mi empresa usa el software</option>
                    </select>
                    <x-input-error :messages="$errors->get('referencia')" class="mt-2 text-red-600 font-semibold" />
                </div>
            -->
                <!-- Interes-->
                <!--
                <div >
                    <x-input-label for="carac_principal" value="¿Qúe carcateristica te interesa más?" />
                    <select id="carac_principal" name="carac_principal" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Selecciona la opción que mejor lo describa</option>
                        <option value="presencia" {{ old('carac_principal') == 'presencia' ? 'selected' : '' }}>Gestor de presencia</option>
                        <option value="chat" {{ old('carac_principal') == 'chat' ? 'selected' : '' }}>Chat en tiempo real</option>
                        <option value="editor" {{ old('carac_principal') == 'editor' ? 'selected' : '' }}>Editor compartido</option>
                    </select>
                    <x-input-error :messages="$errors->get('carac_principal')" class="mt-2 text-red-600 font-semibold" />
                </div>
            -->
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 font-semibold" />
                </div>
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 font-semibold" />
                </div>
                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 font-semibold" />
                </div>
            </div>
    
            <div class="flex justify-between items-center mt-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="px-6 py-2">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-auth-layout>
