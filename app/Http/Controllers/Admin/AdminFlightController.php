<?php

namespace App\Http\Controllers\Admin;

use App\Models\Flight;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminFlightController extends Controller
{
    public function index()
    {
        $flights = Flight::latest()->paginate(10);
        return view('admin.flights.index', compact('flights'));
    }

    public function create()
    {
        return view('admin.flights.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'origin_country' => 'required|string|max:255',
            'destination_country' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'deadline' => 'required|date|after:departure_date',
            'status' => 'required|string|in:scheduled,in-flight,completed,cancelled',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('flights', 'public');
            $validated['image'] = $imagePath;
        }

        Flight::create($validated);

        return redirect()->route('admin.flights.index')
            ->with('success', 'Vol créé avec succès.');
    }

    public function edit(Flight $flight)
    {
        return view('admin.flights.edit', compact('flight'));
    }

    public function update(Request $request, Flight $flight)
    {
        $validated = $request->validate([
            'origin_country' => 'required|string|max:255',
            'destination_country' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'deadline' => 'required|date|after:departure_date',
            'status' => 'required|string|in:scheduled,in-flight,completed,cancelled',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($flight->image) {
                Storage::disk('public')->delete($flight->image);
            }
            $imagePath = $request->file('image')->store('flights', 'public');
            $validated['image'] = $imagePath;
        }

        $flight->update($validated);

        return redirect()->route('admin.flights.index')
            ->with('success', 'Vol mis à jour avec succès.');
    }

    public function destroy(Flight $flight)
    {
        if ($flight->image) {
            Storage::disk('public')->delete($flight->image);
        }

        $flight->delete();

        return redirect()->route('admin.flights.index')
            ->with('success', 'Vol supprimé avec succès.');
    }
}
