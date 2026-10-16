@extends('layouts.app')
@section('content')
<h2>Modifier la Sortie</h2>
<form action="{{ route('sorties.update', $sortie) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Date Sortie</label>
        <input type="date" name="date_sortie" class="form-control" value="{{ $sortie->date_sortie }}" required>
    </div>
    <div class="mb-3">
        <label>Date Retour Prévue</label>
        <input type="date" name="date_retour_prevue" class="form-control" value="{{ $sortie->date_retour_prevue }}">
    </div>
    <div class="mb-3">
        <label>Date Retour Réel</label>
        <input type="date" name="date_retour_reel" class="form-control" value="{{ $sortie->date_retour_reel }}">
    </div>
    <div class="mb-3">
        <label>État Document</label>
        <select name="etat_document" class="form-control" required>
            <option value="bon état" {{ $sortie->etat_document == 'bon état' ? 'selected' : '' }}>Bon état</option>
            <option value="endommagé" {{ $sortie->etat_document == 'endommagé' ? 'selected' : '' }}>Endommagé</option>
            <option value="perdu" {{ $sortie->etat_document == 'perdu' ? 'selected' : '' }}>Perdu</option>
        </select>
    </div>
    <button type="submit" class="btn btn-warning">Modifier</button>
    <a href="{{ route('sorties.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection