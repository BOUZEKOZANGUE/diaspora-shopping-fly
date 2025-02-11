<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <img src="/api/placeholder/48/48" alt="DSF Logo" class="w-12 h-12">
                <h2 class="text-2xl font-bold text-[#0077be]">{{ __('Colis créé avec succès') }}</h2>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                {{-- En-tête avec succès --}}
                <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Colis enregistré avec succès!</h3>
                            <p class="text-green-100">Le colis a été créé et assigné avec succès.</p>
                        </div>
                    </div>
                </div>

                {{-- Informations détaillées --}}
                <div class="px-6 py-8 space-y-8">
                    {{-- Détails du colis --}}
                    <div class="space-y-6">
                        <h4 class="text-xl font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-box mr-2 text-[#0077be]"></i>
                            Détails du Colis
                        </h4>
                        <div class="bg-gray-50 rounded-xl p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Numéro de suivi</p>
                                <p class="mt-1 text-lg font-semibold text-[#0077be]">{{ session('shipment_created.package.tracking') }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Prix</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ number_format(session('shipment_created.package.price'), 2) }} €</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Poids</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ session('shipment_created.package.weight') }} kg</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Description</p>
                                <p class="mt-1 text-base text-gray-900">{{ session('shipment_created.package.description') }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-sm font-medium text-gray-500">Adresse de destination</p>
                                <p class="mt-1 text-base text-gray-900">{{ session('shipment_created.package.destination') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Informations expéditeur --}}
                    <div class="space-y-6">
                        <h4 class="text-xl font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-user mr-2 text-[#0077be]"></i>
                            Informations Expéditeur
                        </h4>
                        <div class="bg-gray-50 rounded-xl p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nom</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ session('shipment_created.user.name') }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Téléphone</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ session('shipment_created.user.phone') }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <p class="text-sm font-medium text-gray-500">Email</p>
                                <p class="mt-1 text-lg font-semibold text-[#0077be]">{{ session('shipment_created.user.email') }}</p>
                            </div>
                            @if(session('shipment_created.user.password'))
                            <div class="md:col-span-2">
                                <p class="text-sm font-medium text-gray-500">Mot de passe temporaire</p>
                                <p class="mt-1 text-lg font-mono bg-yellow-50 p-2 rounded border border-yellow-200 text-yellow-800">
                                    {{ session('shipment_created.user.password') }}
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>

                    {{-- Informations destinataire --}}
                    <div class="space-y-6">
                        <h4 class="text-xl font-semibold text-gray-900 flex items-center">
                            <i class="fas fa-user-check mr-2 text-[#0077be]"></i>
                            Informations Destinataire
                        </h4>
                        <div class="bg-gray-50 rounded-xl p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Nom</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ session('shipment_created.recipient.name') }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Téléphone</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ session('shipment_created.recipient.phone') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end space-x-4">
                    <a href="{{ route('admin.shipments.pdf.new-user', ['tracking' => session('shipment_created.package.tracking')]) }}"
                       class="inline-flex items-center px-4 py-2 border border-[#0077be] rounded-xl font-semibold text-[#0077be] hover:bg-[#0077be] hover:text-white transition-colors duration-200">
                        <i class="fas fa-eye mr-2"></i>
                        Voir le PDF
                    </a>
                    <a href="{{ route('admin.shipments.pdf.new-user.download', ['tracking' => session('shipment_created.package.tracking')]) }}"
                       class="inline-flex items-center px-4 py-2 bg-[#0077be] border border-transparent rounded-xl font-semibold text-white hover:bg-[#005c91] transition-colors duration-200">
                        <i class="fas fa-download mr-2"></i>
                        Télécharger le PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



