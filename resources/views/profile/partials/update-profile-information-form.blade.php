<!--<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
-->

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información del perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualiza la información de tu perfil.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- Nombre --}}
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Apellido --}}
        <div>
            <x-input-label for="apellido" :value="__('Apellidos')" />
            <x-text-input id="apellido" name="apellido" type="text" class="mt-1 block w-full" :value="old('apellido', $user->apellido)" required />
            <x-input-error class="mt-2" :messages="$errors->get('apellido')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Tu correo electrónico no está verificado.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Haz clic aquí para reenviar el correo de verificación.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu correo.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Celular --}}
        <div>
            <x-input-label for="celular" :value="__('Número telefónico')" />
            <x-text-input id="celular" name="celular" type="tel" class="mt-1 block w-full" :value="old('celular', $user->celular)" required />
            <x-input-error class="mt-2" :messages="$errors->get('celular')" />
        </div>

        {{-- Edad  --}}
        <div>
            <x-input-label for="edad" :value="__('Edad')" />
            <x-text-input id="edad" name="edad" type="number" class="mt-1 block w-full" :value="old('edad', $user->edad)" min="1" max="120" />
            <x-input-error class="mt-2" :messages="$errors->get('edad')" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- País --}}
            <div>
                <x-input-label for="pais" :value="__('País')" />
                <select id="pais" name="pais" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Selecciona tu país</option>
                    <option value="mexico" {{ old('pais', $user->pais) == 'mexico' ? 'selected' : '' }}>México</option>
                    <option value="usa" {{ old('pais', $user->pais) == 'usa' ? 'selected' : '' }}>Estados Unidos</option>
                    <option value="espania" {{ old('pais', $user->pais) == 'espania' ? 'selected' : '' }}>España</option>
                    <option value="canada" {{ old('pais', $user->pais) == 'canada' ? 'selected' : '' }}>Canadá</option>
                    <option value="brazil" {{ old('pais', $user->pais) == 'brazil' ? 'selected' : '' }}>Brasil</option>
                    <option value="china" {{ old('pais', $user->pais) == 'china' ? 'selected' : '' }}>China</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('pais')" />
            </div>

            {{-- Estado --}}
            <div>
                <x-input-label for="estado" :value="__('Estado/Departamento')" />
                <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" :value="old('estado', $user->estado)" />
                <x-input-error class="mt-2" :messages="$errors->get('estado')" />
            </div>
        </div>

        {{-- Código Postal --}}
        <div>
            <x-input-label for="codigo_postal" :value="__('Código Postal')" />
            <x-text-input id="codigo_postal" name="codigo_postal" type="text" class="mt-1 block w-full" :value="old('codigo_postal', $user->codigo_postal)" maxlength="10" />
            <x-input-error class="mt-2" :messages="$errors->get('codigo_postal')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>
</section>