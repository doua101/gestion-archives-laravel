@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Documents</h2>
    <a href="{{ route('documents.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Type</th>
            <th>Statut</th>
            <th>Division</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($documents as $document)
        <tr>
            <td>{{ $document->id }}</td>
            <td>{{ $document->title }}</td>
            <td>{{ $document->type }}</td>
            <td>{{ $document->statut }}</td>
            <td>{{ $document->division->nom_division }}</td>
            <td>
                <a href="{{ route('documents.edit', $document) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('documents.destroy', $document) }}" method="POST" style="display:inline">
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