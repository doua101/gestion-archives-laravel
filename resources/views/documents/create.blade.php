@extends('layouts.app')
@section('content')
<h2>Ajouter un Document</h2>
<form action="{{ route('documents.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Titre</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Type</label>
        <input type="text" name="type" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Emplacement</label>
        <input type="text" name="emplacement" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Statut</label>
        <select name="statut" class="form-control" required>
            <option value="disponible">Disponible</option>
            <option value="sorti">Sorti</option>
            <option value="archivé">Archivé</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Division</label>
        <select name="division_id" class="form-control" required>
            @foreach($divisions as $division)
            <option value="{{ $division->id }}">{{ $division->nom_division }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{ route('documents.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection