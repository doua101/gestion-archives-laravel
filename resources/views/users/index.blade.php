@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Utilisateurs</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Fonction</th>
            <th>Email</th>
            <th>Service</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->fonction }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->service ? $user->service->nom_service : '-' }}</td>
            <td>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline">
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