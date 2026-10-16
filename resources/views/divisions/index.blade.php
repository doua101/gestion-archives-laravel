@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Divisions</h2>
    <a href="{{ route('divisions.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nom Division</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($divisions as $division)
        <tr>
            <td>{{ $division->id }}</td>
            <td>{{ $division->nom_division }}</td>
            <td>
                <a href="{{ route('divisions.edit', $division) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('divisions.destroy', $division) }}" method="POST" style="display:inline">
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