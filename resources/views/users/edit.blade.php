@extends('layouts.app')
@section('content')
<h2>Modifier l'Utilisateur</h2>
<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
    </div>
    <div class="mb-3">
        <label>Fonction</label>
        <input type="text" name="fonction" class="form-control" value="{{ $user->fonction }}">
    </div>
    <div class="mb-3">
        <label>Service</label>
        <select name="service_id" class="form-control">
            <option value="">-- Choisir --</option>
            @foreach($services as $service)
            <option value="{{ $service->id }}" {{ $user->service_id == $service->id ? 'selected' : '' }}>{{ $service->nom_service }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-warning">Modifier</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection