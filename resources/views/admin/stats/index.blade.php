<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Statistiques</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500">Total Colis</h3>
                    <p class="mt-2 text-3xl font-semibold">{{ $stats['total_packages'] }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500">Revenu Total</h3>
                    <p class="mt-2 text-3xl font-semibold">{{ number_format($stats['revenue'], 2) }} €</p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500">Utilisateurs</h3>
                    <p class="mt-2 text-3xl font-semibold">{{ $stats['total_users'] }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500">Colis ce mois</h3>
                    <p class="mt-2 text-3xl font-semibold">{{ $stats['monthly_packages'] }}</p>
                </div>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Status Distribution -->
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-medium mb-4">Distribution des statuts</h3>
                    <div class="relative" style="height: 300px;">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>

                <!-- Monthly Revenue -->
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                    <h3 class="text-lg font-medium mb-4">Revenu mensuel</h3>
                    <div class="relative" style="height: 300px;">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Status Chart
        new Chart(document.getElementById('statusChart'), {
            type: 'doughnut',
            data: {
                labels: Object.keys(@json($stats['status_counts'])),
                datasets: [{
                    data: Object.values(@json($stats['status_counts'])),
                    backgroundColor: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444']
                }]
            }
        });

        // Revenue Chart
        new Chart(document.getElementById('revenueChart'), {
            type: 'line',
            data: {
                labels: Object.keys(@json($stats['monthly_revenue'])),
                datasets: [{
                    label: 'Revenu (€)',
                    data: Object.values(@json($stats['monthly_revenue'])),
                    borderColor: '#3B82F6',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endpush
</x-app-layout>
