@extends('layouts.app')

@section('content')
<h2>Ajouter un Service</h2>

<form action="{{ route('services.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nom Service</label>
        <input type="text" name="nom_service" class="form-control" required>
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
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection