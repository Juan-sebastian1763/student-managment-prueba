@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Asignaciones</h1>
    <a href="{{ route('assignments.create') }}" class="btn btn-primary mb-3">Crear Asignación</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->id }}</td>
                    <td>{{ $assignment->name }}</td>
                    <td>{{ $assignment->description }}</td>
                    <td>
                        <a href="{{ route('assignments.edit', $assignment) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('assignments.destroy', $assignment) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection