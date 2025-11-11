@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 fw-bold text-uppercase">Asignar Cursos a Estudiantes</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('assignments.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="student_id" class="form-label fw-bold text-uppercase">Seleccionar Estudiante</label>
                    <select name="student_id" id="student_id" class="form-select form-select-lg" required>
                        <option value="">-- Seleccione un estudiante --</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="course_ids" class="form-label fw-bold text-uppercase">Seleccionar Cursos</label>
                    <select name="course_ids[]" id="course_ids" class="form-select form-select-lg" multiple required>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg">Asignar Cursos</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection