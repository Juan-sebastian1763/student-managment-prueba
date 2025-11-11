@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 fw-bold text-uppercase">Editar Curso</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('courses.update', $course) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold text-uppercase">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="hours" class="form-label fw-bold text-uppercase">Horas</label>
                    <input type="number" name="hours" id="hours" class="form-control" value="{{ $course->hours }}" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2">Actualizar</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection