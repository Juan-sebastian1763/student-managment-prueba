@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 fw-bold text-uppercase">Gestión de Cursos</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover table-borderless">
                <thead class="bg-light text-center">
                    <tr>
                        <th class="fw-bold text-uppercase">ID</th>
                        <th class="fw-bold text-uppercase">Nombre</th>
                        <th class="fw-bold text-uppercase">Horas</th>
                        <th class="fw-bold text-uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->hours }}</td>
                            <td class="text-center">
                                <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning btn-sm text-white">Editar</a>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('courses.destroy', $course) }}')">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay cursos registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('courses.create') }}" class="btn btn-success">Crear Curso</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(url) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esta acción.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;
                form.innerHTML = `
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                `;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection