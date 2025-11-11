<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistema de Gestión Académica')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%);
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 8px;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
        }
        .table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
        }
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @auth
            <div class="col-md-2 sidebar p-0">
                <div class="text-center py-4 border-bottom border-white border-opacity-25">
                    <i class="bi bi-mortarboard-fill text-white" style="font-size: 3rem;"></i>
                    <h5 class="text-white mt-2 mb-0">Academia</h5>
                    <small class="text-white-50">Sistema de Gestión</small>
                </div>
                
                <div class="user-info p-3 border-bottom border-white border-opacity-25">
                    <div class="d-flex align-items-center">
                        <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 45px; height: 45px;">
                            <i class="bi bi-person-fill text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                        <div class="ms-2">
                            <div class="text-white fw-bold small">{{ Auth::user()->name }}</div>
                            <span class="badge bg-warning text-dark">
                                {{ Auth::user()->role === 'admin' ? 'Administrador' : 'Estudiante' }}
                            </span>
                        </div>
                    </div>
                </div>
                
                <nav class="nav flex-column py-3">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                    
                    @if(Auth::user()->role === 'admin')
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="bi bi-people-fill me-2"></i> Usuarios
                        </a>
                        <a class="nav-link" href="{{ route('courses.index') }}">
                            <i class="bi bi-book-fill me-2"></i> Cursos
                        </a>
                        <a class="nav-link" href="{{ route('assignments.index') }}">
                            <i class="bi bi-link-45deg me-2"></i> Asignaciones
                        </a>
                    @endif
                    
                    <hr class="border-white border-opacity-25 mx-3">
                    
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                            <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                        </button>
                    </form>
                </nav>
            </div>
            @endauth
            
            <!-- Main Content -->
            <div class="col-md-{{ auth()->check() ? '10' : '12' }} p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>