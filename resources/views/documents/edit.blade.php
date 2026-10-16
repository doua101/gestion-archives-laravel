@extends('layouts.app')
@section('content')
<h2>Modifier le Document</h2>
<form action="{{ route('documents.update', $document) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Titre</label>
        <input type="text" name="title" class="form-control" value="{{ $document->title }}" required>
    </div>
    <div class="mb-3">
        <label>Type</label>
        <input type="text" name="type" class="form-control" value="{{ $document->type }}" required>
    </div>
    <div class="mb-3">
        <label>Statut</label>
        <select name="statut" class="form-control" required>
            <option value="disponible" {{ $document->statut == 'disponible' ? 'selected' : '' }}>Disponible</option>
            <option value="sorti" {{ $document->statut == 'sorti' ? 'selected' : '' }}>Sorti</option>
            <option value="archivé" {{ $document->statut == 'archivé' ? 'selected' : '' }}>Archivé</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Division</label>
        <select name="division_id" class="form-control" required>
            @foreach($divisions as $division)
            <option value="{{ $division->id }}" {{ $document->division_id == $division->id ? 'selected' : '' }}>{{ $division->nom_division }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-warning">Modifier</button>
    <a href="{{ route('documents.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection