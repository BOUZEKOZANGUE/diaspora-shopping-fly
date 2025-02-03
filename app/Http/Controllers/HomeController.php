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
        }

        return view('home');
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
