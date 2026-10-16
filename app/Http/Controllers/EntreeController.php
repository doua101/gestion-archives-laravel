<?php

namespace App\Http\Controllers;

use App\Models\Entree;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;

class EntreeController extends Controller
{
    public function index()
    {
        $entrees = Entree::with('document', 'user')->get();
        return view('entrees.index', compact('entrees'));
    }

    public function create()
    {
        $documents = Document::all();
        $users = User::all();
        return view('entrees.create', compact('documents', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'document_id' => 'required',
            'user_id'     => 'required',
            'date_entree' => 'required|date',
            'motif'       => 'nullable'
        ]);

        // التحقق من أن الكتاب متاح
        $document = Document::findOrFail($request->document_id);

        if ($document->statut !== 'disponible') {
            return back()
                ->withErrors(['document_id' =>
                    'Ce document est déjà emprunté. Veuillez choisir un autre document.'])
                ->withInput();
        }

        // تغيير حالة الكتاب إلى مُعار
        $document->update(['statut' => 'emprunté']);

        Entree::create($request->all());
        return redirect()->route('entrees.index')
            ->with('success', 'Réception enregistrée avec succès.');
    }

    public function edit(Entree $entree)
    {
        $documents = Document::all();
        $users = User::all();
        return view('entrees.edit', compact('entree', 'documents', 'users'));
    }

    public function update(Request $request, Entree $entree)
    {
        $request->validate([
            'document_id' => 'required',
            'user_id'     => 'required',
            'date_entree' => 'required|date',
        ]);
        $entree->update($request->all());
        return redirect()->route('entrees.index');
    }

    public function destroy(Entree $entree)
    {
        $entree->delete();
        return redirect()->route('entrees.index');
    }

    public function show(Entree $entree)
    {
        return view('entrees.show', compact('entree'));
    }
}