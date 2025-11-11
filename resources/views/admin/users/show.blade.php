@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 fw-bold text-uppercase">Detalles del Usuario</h4>
        </div>
        <div class="card-body">
            <h5 class="fw-bold text-uppercase">Nombre:</h5>
            <p>{{ $user->name }}</p>

            <h5 class="fw-bold text-uppercase">Email:</h5>
            <p>{{ $user->email }}</p>

            <h5 class="fw-bold text-uppercase">Cursos Asignados:</h5>
            @if($user->courses->isEmpty())
                <p>No hay cursos asignados.</p>
            @else
                <ul>
                    @foreach($user->courses as $course)
                        <li>{{ $course->name }} ({{ $course->hours }} horas)</li>
                    @endforeach
                </ul>
            @endif

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection