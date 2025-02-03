<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // Le middleware est déjà appliqué dans les routes, pas besoin ici
        // $this->middleware(['auth', 'admin']);
    }

    public function dashboard()
    {
        // Vérification de sécurité supplémentaire
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('dashboard');
        }

        $stats = [
            'total_packages' => Package::count(),
            'total_users' => User::count(),
            'revenue' => Package::sum('price')
        ];

        $recentPackages = Package::with('user')
                                ->latest()
                                ->take(5)
                                ->get();

        return view('admin.dashboard', compact('stats', 'recentPackages'));
    }
}
