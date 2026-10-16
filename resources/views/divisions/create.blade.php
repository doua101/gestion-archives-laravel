@extends('layouts.app')

@section('content')
<h2>Ajouter une Division</h2>

<form action="{{ route('divisions.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nom Division</label>
        <input type="text" name="nom_division" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{ route('divisions.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection