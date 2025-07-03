<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use App\Models\Flight;
use App\Models\Tracking;
use App\Models\Service;
use App\Models\Advantage;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function dashboard()
    {
        // Statistiques générales
        $stats = [
            'total_packages' => Package::count(),
            'total_users' => User::count(),
            'revenue' => $this->calculateRevenue(),
            'active_packages' => Package::whereNotIn('status', ['delivered', 'cancelled'])->count()
        ];

        // Statistiques des derniers mois
        $monthlyStats = $this->getMonthlyStats();

        // Colis récents avec les relations nécessaires
        $recentPackages = Package::with(['user', 'trackings', 'recipient'])
            ->latest()
            ->take(5)
            ->get();

        // Prochains vols
        // $upcomingFlights = Flight::where('departure_date', '>', now())
        //     ->orderBy('departure_date')
        //     ->take(3)
        //     ->get();

        // Derniers utilisateurs inscrits
        $recentUsers = User::latest()
            ->take(5)
            ->get();

        // Données pour les graphiques
        $chartData = [
            'packages' => $this->getPackagesChartData(),
            'revenue' => $this->getRevenueChartData(),
            'users' => $this->getUsersChartData()
        ];

        return view('admin.dashboard', compact(
            'stats',
            'monthlyStats',
            'recentPackages',
            'recentUsers',
            'chartData'
        ));
    }

    private function calculateRevenue()
    {
        return Package::sum('price');
    }

    private function getMonthlyStats()
    {
        $currentMonth = now()->startOfMonth();

        return [
            'new_packages' => Package::where('created_at', '>=', $currentMonth)->count(),
            'delivered_packages' => Package::where('status', 'delivered')
                                        ->where('updated_at', '>=', $currentMonth)
                                        ->count(),
            'new_users' => User::where('created_at', '>=', $currentMonth)->count(),
            'monthly_revenue' => Package::where('created_at', '>=', $currentMonth)->sum('price')
        ];
    }

    private function getPackagesChartData()
    {
        return Package::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->limit(6)
            ->get()
            ->map(function ($item) {
                return [
                    'month' => Carbon::createFromFormat('Y-m', $item->month)->format('M'),
                    'count' => $item->count
                ];
            });
    }

    private function getRevenueChartData()
    {
        return Package::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('SUM(price) as total')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->limit(6)
            ->get()
            ->map(function ($item) {
                return [
                    'month' => Carbon::createFromFormat('Y-m', $item->month)->format('M'),
                    'total' => round($item->total, 2)
                ];
            });
    }

    private function getUsersChartData()
    {
        return User::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->limit(6)
            ->get()
            ->map(function ($item) {
                return [
                    'month' => Carbon::createFromFormat('Y-m', $item->month)->format('M'),
                    'count' => $item->count
                ];
            });
    }

    // Gestion des Packages
    public function packages()
    {
        $packages = Package::with(['user', 'trackings', 'recipient'])
            ->latest()
            ->paginate(15);

        return view('admin.packages.index', compact('packages'));
    }

    public function packageShow($id)
    {
        $package = Package::with(['user', 'trackings', 'recipient'])
            ->findOrFail($id);

        return view('admin.packages.show', compact('package'));
    }

    // Gestion des Utilisateurs
    public function users()
    {
        $users = User::withCount('packages')
            ->latest()
            ->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function userShow($id)
    {
        $user = User::with(['packages' => function ($query) {
            $query->latest();
        }])->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    // Gestion des Vols
    public function flights()
    {
        $flights = Flight::withCount('packages')
            ->orderBy('departure_date')
            ->paginate(15);

        return view('admin.flights.index', compact('flights'));
    }

    public function flightShow($id)
    {
        $flight = Flight::with(['packages.user', 'packages.recipient'])
            ->findOrFail($id);

        return view('admin.flights.show', compact('flight'));
    }

    // Gestion des Services
    public function services()
    {
        $services = Service::orderBy('display_order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function serviceUpdate(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:50',
            'display_order' => 'required|integer|min:0',
            'active' => 'boolean'
        ]);

        $service->update($validated);
        return redirect()->route('admin.services.index')->with('success', 'Service mis à jour avec succès');
    }

    // Gestion des Avantages
    public function advantages()
    {
        $advantages = Advantage::orderBy('display_order')->get();
        return view('admin.advantages.index', compact('advantages'));
    }

    public function advantageUpdate(Request $request, Advantage $advantage)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:50',
            'display_order' => 'required|integer|min:0',
            'active' => 'boolean'
        ]);

        $advantage->update($validated);
        return redirect()->route('admin.advantages.index')->with('success', 'Avantage mis à jour avec succès');
    }

    // Gestion des Témoignages
    public function testimonials()
    {
        $testimonials = Testimonial::latest()->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function testimonialUpdate(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'approved' => 'boolean',
            'featured' => 'boolean'
        ]);

        $testimonial->update($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Témoignage mis à jour avec succès');
    }

    // Ajout d'un nouveau tracking à un colis
    public function addTracking(Request $request, Package $package)
    {
        $validated = $request->validate([
            'status' => 'required|string',
            'location' => 'required|string',
            'description' => 'nullable|string'
        ]);

        $tracking = new Tracking($validated);
        $package->trackings()->save($tracking);

        // Mise à jour du statut du colis
        $package->status = $validated['status'];
        $package->save();

        return redirect()->back()->with('success', 'Tracking ajouté avec succès');
    }

    // Statistiques détaillées
    public function statistics()
    {
        $yearlyStats = $this->getYearlyStats();
        $statusStats = $this->getStatusStats();
        $performanceStats = $this->getPerformanceStats();

        return view('admin.statistics', compact(
            'yearlyStats',
            'statusStats',
            'performanceStats'
        ));
    }

    private function getYearlyStats()
    {
        $year = now()->year;
        return [
            'total_packages' => Package::whereYear('created_at', $year)->count(),
            'total_revenue' => Package::whereYear('created_at', $year)->sum('price'),
            'new_users' => User::whereYear('created_at', $year)->count(),
            'average_package_price' => Package::whereYear('created_at', $year)->avg('price')
        ];
    }

    private function getStatusStats()
    {
        return Package::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
    }

    private function getPerformanceStats()
    {
        $totalDelivered = Package::where('status', 'delivered')->count();
        $onTime = Package::where('status', 'delivered')
            ->whereRaw('DATE(updated_at) <= DATE_ADD(created_at, INTERVAL 3 DAY)')
            ->count();

        return [
            'delivery_rate' => $totalDelivered > 0 ? ($onTime / $totalDelivered) * 100 : 0,
            'average_delivery_time' => $this->calculateAverageDeliveryTime(),
            'customer_satisfaction' => $this->calculateCustomerSatisfaction()
        ];
    }

    private function calculateAverageDeliveryTime()
    {
        return Package::where('status', 'delivered')
            ->whereNotNull('updated_at')
            ->select(DB::raw('AVG(TIMESTAMPDIFF(HOUR, created_at, updated_at)) as avg_time'))
            ->first()
            ->avg_time ?? 0;
    }

    private function calculateCustomerSatisfaction()
    {
        // À implémenter selon votre logique de satisfaction client
        return 95; // Valeur exemple
    }
}
