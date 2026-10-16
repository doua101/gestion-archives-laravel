@extends('layouts.app')
@section('content')

{{-- Message de succès --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Réceptions</h2>
    <a href="{{ route('entrees.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Document</th>
            <th>Statut</th>
            <th>Utilisateur</th>
            <th>Date Réception</th>
            <th>Motif</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($entrees as $entree)
        <tr>
            <td>{{ $entree->id }}</td>
            <td>{{ $entree->document->title }}</td>
            {{-- Badge de statut --}}
            <td>
                @if($entree->document->statut === 'disponible')
                    <span class="badge bg-success">disponible</span>
                @elseif($entree->document->statut === 'emprunté')
                    <span class="badge bg-danger">emprunté</span>
                @else
                    <span class="badge bg-secondary">{{ $entree->document->statut }}</span>
                @endif
            </td>
            <td>{{ $entree->user->name }}</td>
            <td>{{ $entree->date_entree }}</td>
            <td>{{ $entree->motif }}</td>
            <td>
                <a href="{{ route('entrees.edit', $entree) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('entrees.destroy', $entree) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Supprimer ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection