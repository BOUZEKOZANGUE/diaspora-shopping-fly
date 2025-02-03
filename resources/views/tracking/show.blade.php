<x-guest-layout>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <h1 class="text-2xl font-bold mb-2">
                            Suivi du colis #{{ $tracking->tracking_number }}
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400">
                            Statut actuel:
                            <span class="font-semibold">{{ ucfirst($tracking->status) }}</span>
                        </p>
                    </div>

                    <div class="space-y-4">
                        @foreach($tracking->trackings as $event)
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="h-4 w-4 rounded-full bg-blue-500"></div>
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium">{{ ucfirst($event->status) }}</div>
                                    <div class="text-sm text-gray-500">{{ $event->created_at->format('d/m/Y H:i') }}</div>
                                    @if($event->notes)
                                        <div class="mt-1 text-gray-600">{{ $event->notes }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
