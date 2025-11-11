@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 fw-bold text-uppercase">Crear Curso</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold text-uppercase">Nombre del Curso</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese el nombre del curso" required>
                </div>

                <div class="mb-3">
                    <label for="hours" class="form-label fw-bold text-uppercase">Horas</label>
                    <input type="number" name="hours" id="hours" class="form-control" placeholder="Ingrese la cantidad de horas" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Guardar Curso</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection