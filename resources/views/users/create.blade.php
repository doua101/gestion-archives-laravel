@extends('layouts.app')
@section('content')
<h2>Ajouter un Utilisateur</h2>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Fonction</label>
        <input type="text" name="fonction" class="form-control">
    </div>
    <div class="mb-3">
        <label>Service</label>
        <select name="service_id" class="form-control">
            <option value="">-- Choisir --</option>
            @foreach($services as $service)
            <option value="{{ $service->id }}">{{ $service->nom_service }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection