@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Sorties</h2>
    <a href="{{ route('sorties.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Entrée</th>
            <th>Date Sortie</th>
            <th>Retour Prévu</th>
            <th>Retour Réel</th>
            <th>État</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sorties as $sortie)
        <tr>
            <td>{{ $sortie->id }}</td>
            <td>{{ $sortie->entree->document->title }}</td>
            <td>{{ $sortie->date_sortie }}</td>
            <td>{{ $sortie->date_retour_prevue }}</td>
            <td>{{ $sortie->date_retour_reel }}</td>
            <td>{{ $sortie->etat_document }}</td>
            <td>
                <a href="{{ route('sorties.edit', $sortie) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('sorties.destroy', $sortie) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection