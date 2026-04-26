<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('grupos.index') }}"> Ver grupos</a>
    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button 
        type="submit"
        class="bg-white text-indigo-600 px-4 py-2 rounded-md hover:bg-indigo-700 hover:text-white transition"
    >
        Cerrar sesión
    </button>
</form>
</x-app-layout>
