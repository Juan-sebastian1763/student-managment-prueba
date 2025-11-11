@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white text-center">
            <h4 class="mb-0 fw-bold text-uppercase">Gestión de Usuarios</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <form method="GET" action="{{ route('users.index') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar usuario..." value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Buscar</button>
                    </div>
                </form>
            </div>

            <table class="table table-hover table-borderless">
                <thead class="bg-light text-center">
                    <tr>
                        <th class="fw-bold text-uppercase">ID</th>
                        <th class="fw-bold text-uppercase">Nombre</th>
                        <th class="fw-bold text-uppercase">Email</th>
                        <th class="fw-bold text-uppercase">Cursos</th>
                        <th class="fw-bold text-uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->courses->isEmpty())
                                    <span class="text-muted">Sin cursos</span>
                                @else
                                    <ul>
                                        @foreach($user->courses as $course)
                                            <li>{{ $course->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm text-white">Editar</a>
                                <button class="btn btn-danger btn-sm" onclick="confirmDelete('{{ route('users.destroy', $user) }}')">Eliminar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No hay usuarios registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $users->links() }}
            </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('users.create') }}" class="btn btn-success">Crear Usuario</a>
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