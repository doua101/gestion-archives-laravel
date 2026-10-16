@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Services</h2>
    <a href="{{ route('services.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nom Service</th>
            <th>Division</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($services as $service)
        <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->nom_service }}</td>
            <td>{{ $service->division->nom_division }}</td>
            <td>
                <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('services.destroy', $service) }}" method="POST" style="display:inline">
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