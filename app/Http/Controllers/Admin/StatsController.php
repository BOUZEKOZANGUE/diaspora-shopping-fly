<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatsController extends AdminController
{
    public function index()
    {
        $stats = [
            'total_packages' => Package::count(),
            'total_users' => User::count(),
            'monthly_packages' => Package::whereMonth('created_at', now()->month)->count(),
            'revenue' => Package::sum('price'),
            'status_counts' => Package::groupBy('status')
                ->select('status', DB::raw('count(*) as count'))
                ->pluck('count', 'status'),
            'monthly_revenue' => Package::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(price) as total')
            )
                ->whereYear('created_at', now()->year)
                ->groupBy('month')
                ->pluck('total', 'month')
        ];

        return view('admin.stats.index', compact('stats'));
    }
}
