<x-auth-layout>

    <div class="w-full max-w-5xl mx-auto py-8">

        <h1 class="text-3xl font-bold text-indigo-700 mb-8">
            Perfil
        </h1>

        <div class="space-y-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-md p-8">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="bg-white border border-gray-200 rounded-xl shadow-md p-8">
                @include('profile.partials.update-password-form')
            </div>

            <div class="bg-red-50 border border-red-200 rounded-xl shadow-md p-8">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
</x-auth-layout>