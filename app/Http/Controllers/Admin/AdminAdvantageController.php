<?php

namespace App\Http\Controllers\Admin;

use App\Models\Advantage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAdvantageController extends Controller
{
    public function index()
    {
        $advantages = Advantage::latest()->paginate(10);
        return view('admin.advantages.index', compact('advantages'));
    }

    public function create()
    {
        return view('admin.advantages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('advantages', 'public');
            $validated['image'] = $imagePath;
        }

        Advantage::create($validated);

        return redirect()->route('admin.advantages.index')
            ->with('success', 'Avantage créé avec succès.');
    }

    public function edit(Advantage $advantage)
    {
        return view('admin.advantages.edit', compact('advantage'));
    }

    public function update(Request $request, Advantage $advantage)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($advantage->image) {
                Storage::disk('public')->delete($advantage->image);
            }
            $imagePath = $request->file('image')->store('advantages', 'public');
            $validated['image'] = $imagePath;
        }

        $advantage->update($validated);

        return redirect()->route('admin.advantages.index')
            ->with('success', 'Avantage mis à jour avec succès.');
    }

    public function destroy(Advantage $advantage)
    {
        if ($advantage->image) {
            Storage::disk('public')->delete($advantage->image);
        }

        $advantage->delete();

        return redirect()->route('admin.advantages.index')
            ->with('success', 'Avantage supprimé avec succès.');
    }
}
