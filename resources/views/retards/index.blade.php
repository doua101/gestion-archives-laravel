@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>⚠️ Documents en Retard</h2>
    <span class="badge bg-danger fs-5">{{ $retards->count() }} retard(s)</span>
</div>

@if($retards->count() == 0)
    <div class="alert alert-success">
        ✅ Aucun document en retard !
    </div>
@else
    <table class="table table-bordered table-hover">
        <thead class="table-danger">
            <tr>
                <th>#</th>
                <th>Document</th>
                <th>Emprunté par</th>
                <th>Date Sortie</th>
                <th>Retour Prévu</th>
                <th>Jours de Retard</th>
            </tr>
        </thead>
        <tbody>
            @foreach($retards as $retard)
            <tr class="table-warning">
                <td>{{ $retard->id }}</td>
                <td>{{ $retard->entree->document->title }}</td>
                <td>{{ $retard->entree->user->name }}</td>
                <td>{{ $retard->date_sortie }}</td>
                <td>{{ $retard->date_retour_prevue }}</td>
                <td>
                    <span class="badge bg-danger">
                        {{ \Carbon\Carbon::parse($retard->date_retour_prevue)->diffInDays(\Carbon\Carbon::today()) }} jours
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection