@extends('layouts.app')
@section('content')
<h2>Modifier l'Entrée</h2>
<form action="{{ route('entrees.update', $entree) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Document</label>
        <select name="document_id" class="form-control" required>
            @foreach($documents as $document)
            <option value="{{ $document->id }}" {{ $entree->document_id == $document->id ? 'selected' : '' }}>{{ $document->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Utilisateur</label>
        <select name="user_id" class="form-control" required>
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ $entree->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Date Entrée</label>
        <input type="date" name="date_entree" class="form-control" value="{{ $entree->date_entree }}" required>
    </div>
    <div class="mb-3">
        <label>Motif</label>
        <input type="text" name="motif" class="form-control" value="{{ $entree->motif }}">
    </div>
    <button type="submit" class="btn btn-warning">Modifier</button>
    <a href="{{ route('entrees.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection