@extends('layouts.app')

@section('content')
<h2>Modifier la Division</h2>

<form action="{{ route('divisions.update', $division) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nom Division</label>
        <input type="text" name="nom_division" class="form-control" value="{{ $division->nom_division }}" required>
    </div>
    <button type="submit" class="btn btn-warning">Modifier</button>
    <a href="{{ route('divisions.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection