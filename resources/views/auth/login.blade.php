<x-auth-layout>

    <div class="w-full max-w-md bg-white shadow-xl rounded-xl p-10">

        <!-- Título -->
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">
            Iniciar sesión
        </h2>

        <!-- Session Status -->
        <x-auth-session-status 
            class="mb-4 text-green-600 font-bold text-center" 
            :status="session('status')" 
        />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input 
                    id="email"
                    class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required autofocus autocomplete="username"
                />

                <x-input-error 
                    :messages="$errors->get('email')" 
                    class="mt-2 text-red-600 font-bold" 
                />
            </div>

            <!-- Password -->
            <div class="mt-6">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input 
                    id="password"
                    class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    type="password"
                    name="password"
                    required autocomplete="current-password"
                />

                <x-input-error 
                    :messages="$errors->get('password')" 
                    class="mt-2 text-red-600 font-bold" 
                />
            </div>

            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between mt-6 text-sm">
                <label class="flex items-center gap-2 text-gray-600">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        name="remember"
                        class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                    >
                    Recordarme
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" 
                       class="text-indigo-600 hover:underline">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>

            <!-- Botón -->
            <div class="mt-8">
                <x-primary-button class="w-full justify-center py-2">
                    Iniciar sesión
                </x-primary-button>
            </div>

            <!-- Registro -->
            <div class="text-center mt-6">
                <a href="{{ route('register') }}" 
                   class="text-sm text-gray-600 hover:text-indigo-600">
                    ¿No tienes cuenta? Regístrate
                </a>
            </div>

        </form>

    </div>

</x-auth-layout>