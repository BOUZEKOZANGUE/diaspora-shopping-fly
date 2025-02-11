<?php

namespace App\Http\Controllers\Admin;

use App\Models\PackageFlight;
use App\Models\Package;
use App\Models\Flight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPackageFlightController extends Controller
{
    public function index()
    {
        $packageFlights = PackageFlight::with(['package', 'flight'])->latest()->paginate(10);
        return view('admin.package-flights.index', compact('packageFlights'));
    }

    public function create()
    {
        $packages = Package::all();
        $flights = Flight::all();
        return view('admin.package-flights.create', compact('packages', 'flights'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'flight_id' => 'required|exists:flights,id',
            'expected_delivery_date' => 'required|date',
            'delivered_at' => 'nullable|date',
            'satisfaction_rating' => 'nullable|integer|min:1|max:5'
        ]);

        PackageFlight::create($validated);

        return redirect()->route('admin.package-flights.index')
            ->with('success', 'Association colis-vol créée avec succès.');
    }

    public function edit(PackageFlight $packageFlight)
    {
        $packages = Package::all();
        $flights = Flight::all();
        return view('admin.package-flights.edit', compact('packageFlight', 'packages', 'flights'));
    }

    public function update(Request $request, PackageFlight $packageFlight)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'flight_id' => 'required|exists:flights,id',
            'expected_delivery_date' => 'required|date',
            'delivered_at' => 'nullable|date',
            'satisfaction_rating' => 'nullable|integer|min:1|max:5'
        ]);

        $packageFlight->update($validated);

        return redirect()->route('admin.package-flights.index')
            ->with('success', 'Association colis-vol mise à jour avec succès.');
    }

    public function destroy(PackageFlight $packageFlight)
    {
        $packageFlight->delete();

        return redirect()->route('admin.package-flights.index')
            ->with('success', 'Association colis-vol supprimée avec succès.');
    }
}
