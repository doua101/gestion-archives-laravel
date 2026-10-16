<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Division;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('division')->get();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        $divisions = Division::all();
        return view('documents.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'type'        => 'required',
            'emplacement' => 'required|unique:documents',
            'statut'      => 'required',
            'division_id' => 'required'
        ]);
        Document::create($request->all());
        return redirect()->route('documents.index');
    }

    public function edit(Document $document)
    {
        $divisions = Division::all();
        return view('documents.edit', compact('document', 'divisions'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title'       => 'required',
            'type'        => 'required',
            'statut'      => 'required',
            'division_id' => 'required'
        ]);
        $document->update($request->all());
        return redirect()->route('documents.index');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('documents.index');
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }
}