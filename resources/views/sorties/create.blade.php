@extends('layouts.app')
@section('content')
<h2>Ajouter une Sortie</h2>
<form action="{{ route('sorties.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Entrée (Document)</label>
        <select name="entree_id" class="form-control" required>
            @foreach($entrees as $entree)
            <option value="{{ $entree->id }}">{{ $entree->document->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Date Sortie</label>
        <input type="date" name="date_sortie" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Date Retour Prévue</label>
        <input type="date" name="date_retour_prevue" class="form-control">
    </div>
    <div class="mb-3">
        <label>État Document</label>
        <select name="etat_document" class="form-control" required>
            <option value="bon état">Bon état</option>
            <option value="endommagé">Endommagé</option>
            <option value="perdu">Perdu</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{ route('sorties.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection