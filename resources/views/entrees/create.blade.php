@extends('layouts.app')
@section('content')

<h2>Ajouter une Réception</h2>

{{-- Message de succès --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('entrees.store') }}" method="POST">
    @csrf

    {{-- Sélection du document --}}
    <div class="mb-3">
        <label>Document</label>
        <select name="document_id" class="form-control @error('document_id') is-invalid @enderror" required>
            @foreach($documents as $document)
                <option value="{{ $document->id }}"
                    {{ old('document_id') == $document->id ? 'selected' : '' }}>
                    {{ $document->title }}
                    {{-- Afficher le statut du document --}}
                    ({{ $document->statut }})
                </option>
            @endforeach
        </select>
        {{-- Message d'erreur si document déjà emprunté --}}
        @error('document_id')
            <div class="invalid-feedback d-block">
                <strong>⚠ {{ $message }}</strong>
            </div>
        @enderror
    </div>

    {{-- Sélection de l'utilisateur --}}
    <div class="mb-3">
        <label>Utilisateur</label>
        <select name="user_id" class="form-control" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('user_id') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Date de réception --}}
    <div class="mb-3">
        <label>Date Réception</label>
        <input type="date" name="date_entree" class="form-control"
               value="{{ old('date_entree') }}" required>
    </div>

    {{-- Motif --}}
    <div class="mb-3">
        <label>Motif</label>
        <input type="text" name="motif" class="form-control"
               value="{{ old('motif') }}">
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{ route('entrees.index') }}" class="btn btn-secondary">Annuler</a>

</form>
@endsection