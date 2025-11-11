@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <i class="bi bi-mortarboard-fill text-primary" style="font-size: 4rem;"></i>
                        <h3 class="mt-3 fw-bold">Sistema Académico</h3>
                        <p class="text-muted">Ingresa tus credenciales para continuar</p>
                    </div>
                    
                    <form action="{{ route('login.post') }}" method="POST" id="loginForm">
                        @csrf
                        
                        {{-- SELECCIÓN DE ROL (Añadido) --}}
                        <div class="mb-4 p-3 border rounded">
                            <label class="form-label d-block fw-semibold mb-2">
                                <i class="bi bi-people-fill me-1"></i> Acceder como:
                            </label>
                            <div class="d-flex justify-content-around">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role_access" id="roleAdmin" value="admin" required
                                            {{ old('role_access') == 'admin' ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="roleAdmin">
                                        Administrador
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role_access" id="roleStudent" value="student" required
                                            {{ old('role_access') == 'student' ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="roleStudent">
                                        Alumno
                                    </label>
                                </div>
                            </div>
                            {{-- Mensaje de error para el rol (Si el rol seleccionado no coincide con el usuario) --}}
                            @error('role_access')
                                <div class="text-danger small mt-2 text-center">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Campo Correo Electrónico --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                <i class="bi bi-envelope-fill me-1"></i> Correo Electrónico
                            </label>
                            <input type="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="ejemplo@correo.com"
                                   required 
                                   autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- Campo Contraseña --}}
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-lock-fill me-1"></i> Contraseña
                            </label>
                            <input type="password" 
                                   class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="••••••••"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                Iniciar Sesión
                            </button>
                        </div>
                    </form>
                    
                    <div class="mt-4 p-3 bg-light rounded">
                        <small class="text-muted d-block mb-2"><strong>Credenciales de prueba:</strong></small>
                        <small class="d-block"><strong>Admin:</strong> admin@test.com / password</small>
                        <small class="d-block"><strong>Estudiante:</strong> student@test.com / password</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection