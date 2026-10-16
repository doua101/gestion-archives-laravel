@extends('layouts.app')
@section('content')
<h2>Modifier le Service</h2>
<form action="{{ route('services.update', $service) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nom Service</label>
        <input type="text" name="nom_service" class="form-control" value="{{ $service->nom_service }}" required>
    </div>
    <div class="mb-3">
        <label>Division</label>
        <select name="division_id" class="form-control" required>
            @foreach($divisions as $division)
            <option value="{{ $division->id }}" {{ $service->division_id == $division->id ? 'selected' : '' }}>{{ $division->nom_division }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-warning">Modifier</button>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection