<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema | Sistema Académico</title>
    <!-- Carga de Bootstrap para asegurar el estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            /* Fondo ligeramente más oscuro o gradiente sutil si se desea */
            background-color: #e9ecef;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .welcome-box {
            background-color: #ffffff;
            padding: 60px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            width: 90%;
            text-align: center;
        }
        .system-title {
            color: #0d6efd; /* Color primario de Bootstrap */
            font-weight: 700;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="welcome-box">
        <h1 class="system-title h2">
            Sistema de Gestión Académica
        </h1>
        <p class="lead text-muted mb-4">
            Inicia sesión para acceder a tu panel de control.
        </p>
        
        <!-- Botón que redirige a la vista de login de Laravel (ruta /login) -->
<a href="{{ route('login') }}" class="btn btn-outline-primary">
    <i class="bi bi-box-arrow-in-right me-2"></i>
    Iniciar Sesión
</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>