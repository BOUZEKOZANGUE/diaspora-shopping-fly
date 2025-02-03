<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        // Implémentez votre logique de recherche ici
        return view('search.results', compact('query'));
    }
}
