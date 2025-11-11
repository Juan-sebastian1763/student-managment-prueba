@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    @auth
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="text-white fw-bold">
                    
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </h2>
                <p class="text-white-50 mb-0">Bienvenido al sistema de gestión académica</p>
            </div>
            <div class="text-white">
                <i class="bi bi-calendar3 me-2"></i>
                {{ now()->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
            </div>
        </div>
        
        @if(Auth::user()->role === 'admin')
            <!-- Admin Dashboard -->
            <div class="row g-4">
                <!-- Card: Total Usuarios -->
                <div class="col-md-4">
                    <div class="card border-start border-primary border-5 shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted text-uppercase mb-2">Total Usuarios</h6>
                                    
                                    <h2 class="fw-bold mb-0">{{ $totalUsers }}</h2> 
                                </div>
                                <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-people-fill text-primary" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="mt-3 pt-3 border-top">
                                <small class="text-muted">
                                    <i class="bi bi-person-badge me-1"></i>
                                    {{ $adminCount }} Administradores
                                </small>
                                <br>
                                <small class="text-muted">
                                    <i class="bi bi-mortarboard me-1"></i>
                                    {{ $studentCount }} Estudiantes
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Card: Total Cursos -->
                <div class="col-md-4">
                    <div class="card border-start border-success border-5 shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted text-uppercase mb-2">Total Cursos</h6>
                                    <h2 class="fw-bold mb-0">{{ $totalCourses }}</h2>
                                </div>
                                <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-book-fill text-success" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="mt-3 pt-3 border-top">
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ $totalHours }} horas en total
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Card: Asignaciones -->
                <div class="col-md-4">
                    <div class="card border-start border-warning border-5 shadow">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted text-uppercase mb-2">Asignaciones</h6>
                                    <h2 class="fw-bold mb-0">{{ $totalAssignments }}</h2>
                                </div>
                                <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                    <i class="bi bi-link-45deg text-warning" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="mt-3 pt-3 border-top">
                                <small class="text-muted">
                                    <i class="bi bi-graph-up me-1"></i>
                                    Cursos asignados a estudiantes
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bloques de Listas de Administrador -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold">
                                <i class="bi bi-person-plus me-2 text-primary"></i>
                                Últimos Usuarios Registrados
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @forelse($recentUsers as $user)
                                    <div class="list-group-item border-0 px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                <i class="bi bi-person-fill text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{ $user->name }}</h6>
                                                <small class="text-muted">{{ $user->email }}</small>
                                            </div>
                                            <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'info' }}">
                                                {{ $user->role === 'admin' ? 'Admin' : 'Estudiante' }}
                                            </span>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted text-center py-3">No hay usuarios registrados</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Cursos más populares -->
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold">
                                <i class="bi bi-star-fill me-2 text-warning"></i>
                                Cursos Más Populares
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @forelse($popularCourses as $course)
                                    <div class="list-group-item border-0 px-0">
                                        <div class="d-flex align-items-center">
                                            <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                                <i class="bi bi-book-fill text-success"></i>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">{{ $course->name }}</h6>
                                                <small class="text-muted">{{ $course->hours }} horas</small>
                                            </div>
                                            <span class="badge bg-primary">
                                                {{ $course->users_count }} estudiantes
                                            </span>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted text-center py-3">No hay cursos registrados</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        @else
            <!-- Student Dashboard -->
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 fw-bold">
                                <i class="bi bi-journal-bookmark-fill me-2 text-primary"></i>
                                Mis Cursos Asignados
                            </h5>
                        </div>
                        <div class="card-body">
                            {{-- $myCourses debe ser pasado por el controlador --}}
                            @if($myCourses->count() > 0) 
                                <div class="row g-3">
                                    @foreach($myCourses as $course)
                                        <div class="col-md-6">
                                            <div class="card border-start border-primary border-3 h-100 shadow-sm">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                        <h6 class="fw-bold mb-0">{{ $course->name }}</h6>
                                                        <i class="bi bi-bookmark-fill text-primary"></i>
                                                    </div>
                                                    <div class="d-flex align-items-center text-muted">
                                                        <i class="bi bi-clock me-2"></i>
                                                        <small>{{ $course->hours }} horas de duración</small>
                                                    </div>
                                                    <div class="mt-3">
                                                        <div class="progress" style="height: 8px;">
                                                            {{-- Uso de rand() para simular el progreso --}}
                                                            <div class="progress-bar bg-primary" role="progressbar" 
                                                                style="width: {{ rand(20, 100) }}%"></div>
                                                        </div>
                                                        <small class="text-muted d-block mt-1">Progreso del curso</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="bi bi-inbox text-muted" style="font-size: 4rem;"></i>
                                    <p class="text-muted mt-3">Aún no tienes cursos asignados</p>
                                    <small class="text-muted">Contacta al administrador para más información</small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card border-start border-info border-5 shadow">
                        <div class="card-body">
                            <h6 class="text-muted text-uppercase mb-3">Resumen Personal</h6>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">Total de Cursos</span>
                                    {{-- $myCourses debe ser pasado por el controlador --}}
                                    <h4 class="fw-bold mb-0">{{ $myCourses->count() }}</h4> 
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">Horas Totales</span>
                                    <h4 class="fw-bold mb-0">{{ $myCourses->sum('hours') }}</h4>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <small class="text-muted d-block mb-2">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Información de Contacto
                                </small>
                                <small class="text-muted d-block">
                                    <i class="bi bi-envelope me-2"></i>{{ Auth::user()->email }}
                                </small>
                                <small class="text-muted d-block">
                                    <i class="bi bi-telephone me-2"></i>{{ Auth::user()->phone ?? 'No registrado' }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
    @else
        <div class="alert alert-danger text-center">
            Debes iniciar sesión para ver el Dashboard.
        </div>
    @endauth
</div>
@endsection