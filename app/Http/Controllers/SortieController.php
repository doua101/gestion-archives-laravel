<?php

namespace App\Http\Controllers;

use App\Models\Sortie;
use App\Models\Entree;
use Illuminate\Http\Request;

class SortieController extends Controller
{
    public function index()
    {
        $sorties = Sortie::with('entree')->get();
        return view('sorties.index', compact('sorties'));
    }

    public function create()
    {
        $entrees = Entree::with('document')->get();
        return view('sorties.create', compact('entrees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'entree_id'          => 'required',
            'date_sortie'        => 'required|date',
            'date_retour_prevue' => 'nullable|date',
            'etat_document'      => 'required'
        ]);
        Sortie::create($request->all());
        return redirect()->route('sorties.index');
    }

    public function edit(Sortie $sortie)
    {
        $entrees = Entree::with('document')->get();
        return view('sorties.edit', compact('sortie', 'entrees'));
    }

    public function update(Request $request, Sortie $sortie)
    {
        $request->validate([
            'date_sortie'        => 'required|date',
            'date_retour_prevue' => 'nullable|date',
            'date_retour_reel'   => 'nullable|date',
            'etat_document'      => 'required'
        ]);

        $sortie->update($request->all());

        // عند الإرجاع → الكتاب يصبح متاحاً مجدداً
        if ($request->filled('date_retour_reel')) {
            $document = $sortie->entree->document;
            $document->update(['statut' => 'disponible']);
        }

        return redirect()->route('sorties.index')
            ->with('success', 'Retour enregistré avec succès.');
    }

    public function destroy(Sortie $sortie)
    {
        $sortie->delete();
        return redirect()->route('sorties.index');
    }

    public function show(Sortie $sortie)
    {
        return view('sorties.show', compact('sortie'));
    }
}