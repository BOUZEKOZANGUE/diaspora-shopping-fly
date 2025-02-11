<?php
namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class HomeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('dashboard');
            }else {
            return view('home');
            
        }

        // Données pour la landing page
        $advantages = [
            [
                'icon' => 'shield-alt',
                'title' => 'Sécurité Garantie',
                'description' => 'Vos colis sont assurés et suivis en temps réel'
            ],
            [
                'icon' => 'clock',
                'title' => 'Rapidité',
                'description' => 'Livraison express en 48-72h'
            ],
            [
                'icon' => 'dollar-sign',
                'title' => 'Prix Compétitifs',
                'description' => 'Tarifs adaptés à tous les budgets'
            ]
        ];

        $services = [
            [
                'icon' => 'plane-departure',
                'title' => 'Transport Aérien',
                'description' => 'Envoi express de colis par avion'
            ],
            [
                'icon' => 'map-marker-alt',
                'title' => 'Livraison à Domicile',
                'description' => 'Service de porte-à-porte'
            ],
            [
                'icon' => 'box',
                'title' => 'Emballage Sécurisé',
                'description' => 'Protection optimale de vos colis'
            ]
        ];

        $testimonials = [
            [
                'name' => 'Marie K.',
                'location' => 'Paris',
                'text' => 'Service excellent ! Mon colis est arrivé en temps record à Douala.',
                'rating' => 5
            ],
            [
                'name' => 'Jean P.',
                'location' => 'Bruxelles',
                'text' => 'Très professionnel et prix compétitifs. Je recommande !',
                'rating' => 5
            ],
            [
                'name' => 'Sophie M.',
                'location' => 'Yaoundé',
                'text' => 'Un service client exceptionnel et un suivi impeccable.',
                'rating' => 5
            ]
        ];

        $nextDepartures = [
            [
                'from' => 'FR',
                'to' => 'CM',
                'date' => now()->addDays(2)->format('d F Y'),
                'deadline' => now()->addDays(1)->format('d F, H:i'),
                'status' => 'Prochain vol',
                'status_class' => 'green'
            ],
            [
                'from' => 'CM',
                'to' => 'FR',
                'date' => now()->addDays(5)->format('d F Y'),
                'deadline' => now()->addDays(4)->format('d F, H:i'),
                'status' => 'Dans 5 jours',
                'status_class' => 'yellow'
            ]
        ];

        $aboutPoints = [
            'Plus de 10 ans d\'expérience',
            'Plus de 50,000 colis livrés',
            'Réseau international fiable',
            'Service client 24/7'
        ];

        return view('home', compact(
            'advantages',
            'services',
            'testimonials',
            'nextDepartures',
            'aboutPoints'
        ));
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('home');
        }

        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        $stats = [
            'total_packages' => Package::where('user_id', Auth::id())->count(),
            'pending_packages' => Package::where('user_id', Auth::id())
                                      ->where('status', 'pending')
                                      ->count(),
            'delivered_packages' => Package::where('user_id', Auth::id())
                                        ->where('status', 'delivered')
                                        ->count()
        ];

        $packages = Package::where('user_id', Auth::id())
                          ->latest()
                          ->paginate(5);

        return view('dashboard', compact('stats', 'packages'));
    }
}
