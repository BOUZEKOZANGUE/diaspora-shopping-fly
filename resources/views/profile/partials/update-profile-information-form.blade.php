<section class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-all duration-300">
    <header class="border-b border-gray-100 pb-6">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-[#0077be] rounded-lg">
                <svg class="w-5 h-5 text-[#0077be]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-900">
                    {{ __('Information du profil') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    {{ __('Mettez à jour les informations de votre profil et votre adresse email.') }}
                </p>
            </div>
        </div>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="space-y-4">
            <div class="group">
                <x-input-label for="name" :value="__('Nom')" class="text-sm font-medium text-gray-700" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-[#0077be] transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <x-text-input
                        id="name"
                        name="name"
                        type="text"
                        class="pl-10 block w-full rounded-lg border-gray-200 focus:border-[#0077be] focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200"
                        :value="old('name', $user->name)"
                        required
                        autofocus
                        autocomplete="name"
                    />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="group">
                <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <x-text-input
                        id="email"
                        name="email"
                        type="email"
                        class="pl-10 block w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-all duration-200"
                        :value="old('email', $user->email)"
                        required
                        autocomplete="email"
                    />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
        </div>

        <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-100">
            <button type="submit"
                class="flex items-center gap-2 px-4 py-2 bg-[#0077be]  text-white rounded-lg hover:bg-[#0077be] focus:ring-2 focus:ring-[#0077be] focus:ring-offset-2 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                    <polyline points="17 21 17 13 7 13 7 21" />
                    <polyline points="7 3 7 8 15 8" />
                </svg>
                {{ __('Enregistrer') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    x-init="setTimeout(() => show = false, 3000)"
                    class="bg-green-50 text-green-700 px-4 py-2 rounded-lg flex items-center"
                >
                   <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                        <polyline points="22 4 12 14.01 9 11.01" />
                    </svg>
                    <p class="text-sm font-medium">{{ __('Sauvegardé.') }}</p>
                </div>
            @endif
        </div>
    </form>
</section>
