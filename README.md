# 🎓 Sistema de Gestión de Cursos y Alumnos

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

**Sistema web completo de gestión de usuarios, cursos y asignaciones con control de acceso basado en roles**

[Características](#-características) •
[Instalación](#-instalación) •
[API](#-documentación-api) •
[Demo](#-demo)

</div>

---

## 📋 Tabla de Contenidos

- [Descripción del Proyecto](#-descripción-del-proyecto)
- [Análisis del Problema](#-análisis-del-problema-y-solución)
- [Características](#-características)
- [Tecnologías Utilizadas](#-tecnologías-utilizadas)
- [Arquitectura del Sistema](#-arquitectura-del-sistema)
- [Instalación](#-instalación)
- [Configuración](#-configuración)
- [Estructura de la Base de Datos](#-estructura-de-la-base-de-datos)
- [Documentación API](#-documentación-api)
- [Capturas de Pantalla](#-capturas-de-pantalla)
- [Pruebas con Postman](#-pruebas-con-postman)
- [Usuarios de Prueba](#-usuarios-de-prueba)
- [Funcionalidades Implementadas](#-funcionalidades-implementadas)
- [Validaciones](#-validaciones)
- [Seguridad](#-seguridad)
- [Autor](#-autor)

---

## 🚀 Descripción del Proyecto

Sistema web desarrollado con **Laravel 10** que permite la gestión completa de usuarios, cursos y sus asignaciones. El sistema implementa un control de acceso basado en roles (RBAC) con dos perfiles principales:

### 👨‍💼 Perfil Administrador
- Gestión completa de usuarios (CRUD)
- Gestión completa de cursos (CRUD)
- Asignación de múltiples cursos a usuarios
- Visualización de listado completo con filtros avanzados
- Dashboard con estadísticas del sistema

### 👨‍🎓 Perfil Alumno
- Visualización de cursos asignados
- Detalles de cada curso (nombre e intensidad horaria)
- Dashboard personalizado

---

## 🎯 Análisis del Problema y Solución

### 📊 Problema Identificado

Se requiere una plataforma web que permita:

1. **Autenticación segura** de usuarios mediante email y contraseña
2. **Control de acceso diferenciado** según el rol del usuario
3. **Gestión administrativa** completa de usuarios y cursos
4. **Asignación flexible** de múltiples cursos a múltiples usuarios
5. **Consultas eficientes** con capacidad de filtrado

### 💡 Solución Implementada

#### 1. **Arquitectura MVC con Laravel**
- Separación clara de responsabilidades
- Uso de Eloquent ORM para abstracción de base de datos
- Controladores específicos para cada entidad

#### 2. **API RESTful**
- Todas las respuestas en formato JSON
- Endpoints semánticos y bien estructurados
- Códigos de estado HTTP apropiados

#### 3. **Sistema de Autenticación**
- Laravel Sanctum para autenticación de API
- Sesiones para aplicación web
- Middleware de autenticación y autorización

#### 4. **Modelo de Datos Relacional**
```
Users (1) ──< (N) Assignments (N) >── (1) Courses
```
- Relación muchos a muchos entre usuarios y cursos
- Tabla pivot para asignaciones
- Integridad referencial garantizada

#### 5. **Frontend Responsivo**
- Bootstrap 5 para diseño adaptativo
- Vistas Blade para renderizado del lado del servidor
- JavaScript vanilla para interactividad

---

## ✨ Características

### 🔐 Autenticación y Autorización
- [x] Login con email y contraseña
- [x] Validación de credenciales
- [x] Control de acceso basado en roles
- [x] Protección de rutas mediante middleware
- [x] Sesiones seguras

### 👥 Gestión de Usuarios (Administrador)
- [x] Crear nuevos usuarios con información completa
- [x] Editar información de usuarios existentes
- [x] Eliminar usuarios del sistema
- [x] Listar todos los usuarios
- [x] Filtrar usuarios por nombre, email o rol
- [x] Visualizar cursos asignados a cada usuario

### 📚 Gestión de Cursos (Administrador)
- [x] Crear cursos con nombre e intensidad horaria
- [x] Editar información de cursos
- [x] Eliminar cursos
- [x] Listar todos los cursos disponibles
- [x] Ver cantidad de alumnos por curso

### 🔗 Gestión de Asignaciones (Administrador)
- [x] Asignar múltiples cursos a un usuario
- [x] Eliminar asignaciones existentes
- [x] Ver historial completo de asignaciones
- [x] Prevención de asignaciones duplicadas

### 👨‍🎓 Vista de Alumno
- [x] Listado de cursos asignados
- [x] Detalles completos de cada curso
- [x] Interfaz intuitiva y fácil de usar

### 🎨 Interfaz de Usuario
- [x] Diseño responsivo con Bootstrap
- [x] Validación de formularios en tiempo real
- [x] Mensajes de confirmación y error
- [x] Tablas interactivas con DataTables
- [x] Modales para acciones importantes

---

## 🛠️ Tecnologías Utilizadas

### Backend
| Tecnología | Versión | Uso |
|------------|---------|-----|
| PHP | 8.1+ | Lenguaje de programación |
| Laravel | 10.x | Framework PHP |
| MySQL | 8.0+ | Base de datos relacional |
| Composer | 2.x | Gestor de dependencias PHP |

### Frontend
| Tecnología | Versión | Uso |
|------------|---------|-----|
| Bootstrap | 5.3 | Framework CSS |
| JavaScript | ES6+ | Interactividad |
| Blade | - | Motor de plantillas |
| Font Awesome | 6.x | Iconos |

### Herramientas de Desarrollo
- **Postman**: Testing de API
- **Git**: Control de versiones
- **Laravel Sanctum**: Autenticación API
- **Laravel Mix**: Compilación de assets

---

## 🏗️ Arquitectura del Sistema

### Estructura de Directorios

```
📦 proyecto-laravel/
├── 📂 app/
│   ├── 📂 Http/
│   │   ├── 📂 Controllers/
│   │   │   ├── 📄 AuthController.php         
│   │   │   ├── 📄 UserController.php         
│   │   │   ├── 📄 CourseController.php       
│   │   │   └── 📄 AssignmentController.php   
│   │   ├── 📂 Middleware/
│   │   │   ├── 📄 CheckAdmin.php             
│   │   │   └── 📄 CheckStudent.php           
│   │   └── 📂 Requests/
│   │       ├── 📄 UserRequest.php            
│   │       └── 📄 CourseRequest.php          
│   ├── 📂 Models/
│   │   ├── 📄 User.php                       
│   │   ├── 📄 Course.php                     
│   │   └── 📄 Assignment.php                 
│   └── 📂 Providers/
├── 📂 database/
│   ├── 📂 migrations/
│   │   ├── 📄 create_users_table.php
│   │   ├── 📄 create_courses_table.php
│   │   └── 📄 create_assignments_table.php
│   ├── 📂 seeders/
│   │   ├── 📄 DatabaseSeeder.php
│   │   └── 📄 UsersTableSeeder.php
│   └── 📂 factories/
├── 📂 resources/
│   └── 📂 views/
│       ├── 📂 auth/
│       │   └── 📄 login.blade.php
│       ├── 📂 admin/
│       │   ├── 📄 dashboard.blade.php
│       │   ├── 📄 users.blade.php
│       │   ├── 📄 courses.blade.php
│       │   └── 📄 assignments.blade.php
│       ├── 📂 student/
│       │   └── 📄 my-courses.blade.php
│       └── 📂 layouts/
│           └── 📄 app.blade.php
├── 📂 routes/
│   ├── 📄 web.php                            
│   └── 📄 api.php                            
├── 📂 public/
│   ├── 📂 css/
│   └── 📂 js/
├── 📄 .env.example
├── 📄 composer.json
└── 📄 README.md
```

### Flujo de Datos

```
┌─────────────┐
│   Cliente   │
│  (Browser)  │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│   Routes    │ ◄── web.php / api.php
│  (Laravel)  │
└──────┬──────┘
       │
       ▼
┌─────────────┐
│ Middleware  │ ◄── Auth / Admin / Student
└──────┬──────┘
       │
       ▼
┌─────────────┐
│ Controller  │ ◄── Lógica de negocio
└──────┬──────┘
       │
       ▼
┌─────────────┐
│   Model     │ ◄── Eloquent ORM
└──────┬──────┘
       │
       ▼
┌─────────────┐
│   MySQL     │ ◄── Base de datos
└─────────────┘
```

---

## 📥 Instalación

### Prerrequisitos

Asegúrate de tener instalado:

- ✅ PHP >= 8.1
- ✅ Composer
- ✅ MySQL >= 8.0
- ✅ Node.js y NPM (opcional)
- ✅ Git

### Paso a Paso

#### 1️⃣ Clonar el Repositorio

```bash
git clone https://github.com/Juan-sebastian1763/student-managment-prueba.git
cd student-managment-system
```

#### 2️⃣ Instalar Dependencias PHP

```bash
composer install
```

#### 3️⃣ Configurar Variables de Entorno

```bash
cp .env.example .env
```

Edita el archivo `.env` con tus credenciales:

```env
APP_NAME="student-managment-system"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_managment
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

#### 4️⃣ Generar Key de Aplicación

```bash
php artisan key:generate
```

#### 5️⃣ Crear Base de Datos

Ejecuta en MySQL:

```sql
CREATE DATABASE student_managment CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

#### 6️⃣ Ejecutar Migraciones

```bash
php artisan migrate
```

#### 7️⃣ Ejecutar Seeders (Datos de Prueba)

```bash
php artisan db:seed
```

Esto creará:
- 1 usuario administrador
- 2 usuarios alumnos
- 5 cursos de ejemplo
- Asignaciones de prueba

#### 8️⃣ Instalar Dependencias Frontend (Opcional)

```bash
npm install
npm run dev
```

#### 9️⃣ Iniciar Servidor de Desarrollo

```bash
php artisan serve
```

🎉 **¡Listo!** Accede a: `http://localhost:8000`

---

## ⚙️ Configuración

### Configuración de Roles

Los roles se definen en la tabla `users`:

```php
// En el modelo User
public const ROLE_ADMIN = 'admin';
public const ROLE_STUDENT = 'student';
```

### Configuración de Middleware

En `app/Http/Kernel.php`:

```php
protected $routeMiddleware = [
    'admin' => \App\Http\Middleware\CheckAdmin::class,
    'student' => \App\Http\Middleware\CheckStudent::class,
];
```

---

## 🗄️ Estructura de la Base de Datos

### Diagrama Entidad-Relación

```
┌─────────────────┐         ┌──────────────────┐         ┌─────────────────┐
│     USERS       │         │   ASSIGNMENTS    │         │    COURSES      │
├─────────────────┤         ├──────────────────┤         ├─────────────────┤
│ id (PK)         │─────┐   │ id (PK)          │   ┌─────│ id (PK)         │
│ name            │     └───│ user_id (FK)     │───┘     │ name            │
│ email (unique)  │         │ course_id (FK)   │         │ hours           │
│ phone           │         │ assigned_at      │         │ description     │
│ password        │         │ created_at       │         │ created_at      │
│ role            │         │ updated_at       │         │ updated_at      │
│ created_at      │         └──────────────────┘         └─────────────────┘
│ updated_at      │
└─────────────────┘
```

### Tablas Detalladas

#### 📋 Tabla: `users`

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | BIGINT(PK) | Identificador único |
| name | VARCHAR(255) | Nombre completo |
| email | VARCHAR(255) UNIQUE | Correo electrónico |
| phone | VARCHAR(20) | Número de teléfono |
| password | VARCHAR(255) | Contraseña hasheada |
| role | ENUM('admin','student') | Rol del usuario |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

#### 📋 Tabla: `courses`

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | BIGINT(PK) | Identificador único |
| name | VARCHAR(255) | Nombre del curso |
| hours | INT | Intensidad horaria |
| description | TEXT | Descripción (opcional) |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

#### 📋 Tabla: `assignments`

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | BIGINT(PK) | Identificador único |
| user_id | BIGINT(FK) | ID del usuario |
| course_id | BIGINT(FK) | ID del curso |
| assigned_at | TIMESTAMP | Fecha de asignación |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

**Índices y Restricciones:**
- UNIQUE(user_id, course_id) - Previene asignaciones duplicadas
- FK user_id REFERENCES users(id) ON DELETE CASCADE
- FK course_id REFERENCES courses(id) ON DELETE CASCADE

---

## 📡 Documentación API

### Base URL
```
http://localhost:8000/api
```

### Autenticación

Todas las rutas protegidas requieren el token de autenticación en el header:
```
Authorization: Bearer {token}
```

---

### 🔐 Endpoints de Autenticación

#### POST `/api/login`
Autenticar usuario y obtener token.

**Request Body:**
```json
{
  "email": "admin@example.com",
  "password": "password"
}
```

**Response 200:**
```json
{
  "success": true,
  "message": "Login exitoso",
  "data": {
    "user": {
      "id": 1,
      "name": "Administrador",
      "email": "admin@example.com",
      "role": "admin"
    },
    "token": "1|abc123xyz..."
  }
}
```

**Response 401:**
```json
{
  "success": false,
  "message": "Credenciales inválidas"
}
```

---

#### POST `/api/logout`
Cerrar sesión del usuario autenticado.

**Headers:**
```
Authorization: Bearer {token}
```

**Response 200:**
```json
{
  "success": true,
  "message": "Sesión cerrada exitosamente"
}
```

---

### 👥 Endpoints de Usuarios (Admin)

#### GET `/api/users`
Obtener listado de todos los usuarios.

**Headers:**
```
Authorization: Bearer {token}
```

**Query Parameters:**
- `search` (opcional): Buscar por nombre o email
- `role` (opcional): Filtrar por rol (admin/student)

**Response 200:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Juan Pérez",
      "email": "juan@example.com",
      "phone": "3001234567",
      "role": "student",
      "courses_count": 3,
      "created_at": "2024-01-15T10:30:00.000000Z"
    }
  ]
}
```

---

#### POST `/api/users`
Crear un nuevo usuario.

**Request Body:**
```json
{
  "name": "María García",
  "email": "maria@example.com",
  "phone": "3009876543",
  "password": "password123",
  "password_confirmation": "password123",
  "role": "student"
}
```

**Validaciones:**
- `name`: Requerido, máximo 255 caracteres
- `email`: Requerido, email válido, único
- `phone`: Requerido, máximo 20 caracteres
- `password`: Requerido, mínimo 8 caracteres, confirmación
- `role`: Requerido, debe ser 'admin' o 'student'

**Response 201:**
```json
{
  "success": true,
  "message": "Usuario creado exitosamente",
  "data": {
    "id": 5,
    "name": "María García",
    "email": "maria@example.com",
    "phone": "3009876543",
    "role": "student"
  }
}
```

---

#### GET `/api/users/{id}`
Obtener detalles de un usuario específico.

**Response 200:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Juan Pérez",
    "email": "juan@example.com",
    "phone": "3001234567",
    "role": "student",
    "courses": [
      {
        "id": 1,
        "name": "Laravel Avanzado",
        "hours": 40,
        "assigned_at": "2024-01-15T10:30:00.000000Z"
      }
    ]
  }
}
```

---

#### PUT `/api/users/{id}`
Actualizar información de un usuario.

**Request Body:**
```json
{
  "name": "Juan Pérez Actualizado",
  "email": "juan.nuevo@example.com",
  "phone": "3001111111",
  "role": "student"
}
```

**Response 200:**
```json
{
  "success": true,
  "message": "Usuario actualizado exitosamente",
  "data": {
    "id": 1,
    "name": "Juan Pérez Actualizado",
    "email": "juan.nuevo@example.com",
    "phone": "3001111111",
    "role": "student"
  }
}
```

---

#### DELETE `/api/users/{id}`
Eliminar un usuario.

**Response 200:**
```json
{
  "success": true,
  "message": "Usuario eliminado exitosamente"
}
```

---

### 📚 Endpoints de Cursos (Admin)

#### GET `/api/courses`
Obtener listado de todos los cursos.

**Response 200:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Laravel Avanzado",
      "hours": 40,
      "description": "Curso completo de Laravel",
      "students_count": 5,
      "created_at": "2024-01-10T08:00:00.000000Z"
    }
  ]
}
```

---

#### POST `/api/courses`
Crear un nuevo curso.

**Request Body:**
```json
{
  "name": "Vue.js Básico",
  "hours": 30,
  "description": "Introducción a Vue.js"
}
```

**Validaciones:**
- `name`: Requerido, máximo 255 caracteres, único
- `hours`: Requerido, número entero positivo
- `description`: Opcional, texto

**Response 201:**
```json
{
  "success": true,
  "message": "Curso creado exitosamente",
  "data": {
    "id": 6,
    "name": "Vue.js Básico",
    "hours": 30,
    "description": "Introducción a Vue.js"
  }
}
```

---

#### GET `/api/courses/{id}`
Obtener detalles de un curso específico.

**Response 200:**
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Laravel Avanzado",
    "hours": 40,
    "description": "Curso completo de Laravel",
    "students": [
      {
        "id": 2,
        "name": "Juan Pérez",
        "email": "juan@example.com",
        "assigned_at": "2024-01-15T10:30:00.000000Z"
      }
    ]
  }
}
```

---

#### PUT `/api/courses/{id}`
Actualizar información de un curso.

**Request Body:**
```json
{
  "name": "Laravel Avanzado 2024",
  "hours": 45,
  "description": "Curso actualizado de Laravel"
}
```

**Response 200:**
```json
{
  "success": true,
  "message": "Curso actualizado exitosamente",
  "data": {
    "id": 1,
    "name": "Laravel Avanzado 2024",
    "hours": 45,
    "description": "Curso actualizado de Laravel"
  }
}
```

---

#### DELETE `/api/courses/{id}`
Eliminar un curso.

**Response 200:**
```json
{
  "success": true,
  "message": "Curso eliminado exitosamente"
}
```

---

### 🔗 Endpoints de Asignaciones (Admin)

#### POST `/api/assignments`
Asignar curso(s) a un usuario.

**Request Body:**
```json
{
  "user_id": 2,
  "course_ids": [1, 2, 3]
}
```

**Validaciones:**
- `user_id`: Requerido, debe existir
- `course_ids`: Requerido, array de IDs válidos

**Response 201:**
```json
{
  "success": true,
  "message": "Cursos asignados exitosamente",
  "data": {
    "assigned": 3,
    "skipped": 0,
    "assignments": [
      {
        "id": 10,
        "user_id": 2,
        "course_id": 1,
        "assigned_at": "2024-01-20T15:30:00.000000Z"
      }
    ]
  }
}
```

---

#### DELETE `/api/assignments/{id}`
Eliminar una asignación.

**Response 200:**
```json
{
  "success": true,
  "message": "Asignación eliminada exitosamente"
}
```

---

#### GET `/api/users/{id}/courses`
Obtener cursos asignados a un usuario específico.

**Response 200:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Laravel Avanzado",
      "hours": 40,
      "assigned_at": "2024-01-15T10:30:00.000000Z",
      "assignment_id": 5
    }
  ]
}
```

---

### 👨‍🎓 Endpoints de Alumno

#### GET `/api/my-courses`
Obtener cursos asignados al usuario autenticado (alumno).

**Headers:**
```
Authorization: Bearer {token}
```

**Response 200:**
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Laravel Avanzado",
      "hours": 40,
      "description": "Curso completo de Laravel",
      "assigned_at": "2024-01-15T10:30:00.000000Z"
    }
  ]
}
```

---

### 📊 Códigos de Estado HTTP

| Código | Significado |
|--------|-------------|
| 200 | OK - Solicitud exitosa |
| 201 | Created - Recurso creado exitosamente |
| 400 | Bad Request - Datos inválidos |
| 401 | Unauthorized - No autenticado |
| 403 | Forbidden - No autorizado (rol) |
| 404 | Not Found - Recurso no encontrado |
| 422 | Unprocessable Entity - Validación fallida |
| 500 | Internal Server Error - Error del servidor |

---



## 🧪 Pruebas con Postman

### Importar Colección

1. Descarga el archivo `postman_collection.json` del repositorio
2. Abre Postman
3. Click en "Import"
4. Selecciona el archivo JSON
5. La colección aparecerá en tu sidebar

### Configurar Variables de Entorno

Crea un entorno en Postman con estas variables:

```json
{
  "base_url": "http://localhost:8000",
  "token": "",
  "user_id": "",
  "course_id": ""
}
```

### Flujo de Pruebas Recomendado

```
1. Login (Admin)
   └─> Guarda el token automáticamente
   
2. Crear Usuario
   └─> POST /api/users
   
3. Listar Usuarios
   └─> GET /api/users
   
4. Crear Curso
   └─> POST /api/courses
   
5. Asignar Curso a Usuario
   └─> POST /api/assignments
   
6. Ver Cursos del Usuario
   └─> GET /api/users/{id}/courses
   
7. Login (Alumno)
   └─> Cambiar credenciales
   
8. Ver Mis Cursos
   └─> GET /api/my-courses
```

### Scripts Pre-request (Ejemplo)

Para el token automático en cada request:

```javascript
// En Tests del endpoint Login
pm.environment.set("token", pm.response.json().data.token);

// En Pre-request de otros endpoints
pm.request.headers.add({
    key: 'Authorization',
    value: 'Bearer ' + pm.environment.get('token')
});
```

---

## 👤 Usuarios de Prueba

Después de ejecutar los seeders (`php artisan db:seed`):

### Administrador

```
📧 Email: admin@example.com
🔑 Password: password
👤 Rol: Administrador
```

**Permisos:**
- ✅ Ver cursos asignados

---

## ✅ Funcionalidades Implementadas

### 🎯 Tareas Completadas

#### ✅ Tarea 1: Análisis del Problema
- [x] Análisis completo del sistema requerido
- [x] Identificación de entidades y relaciones
- [x] Diseño de arquitectura de solución
- [x] Definición de flujos de usuario

#### ✅ Tarea 2: Sistema de Login
- [x] Formulario de login con validación
- [x] Autenticación mediante email y contraseña
- [x] Generación de tokens de sesión
- [x] Redirección según perfil de usuario
- [x] Middleware de autenticación
- [x] Protección de rutas

#### ✅ Tarea 3: CRUD de Alumnos/Usuarios
- [x] Crear usuarios con validación completa
  - Nombre (requerido, máx 255 caracteres)
  - Email (requerido, único, formato válido)
  - Teléfono (requerido, máx 20 caracteres)
  - Contraseña (requerido, mín 8 caracteres, confirmación)
  - Rol (admin/student)
- [x] Listar todos los usuarios
- [x] Filtrar usuarios por nombre, email o rol
- [x] Ver detalles de usuario con cursos asignados
- [x] Editar información de usuarios
- [x] Eliminar usuarios (con confirmación)
- [x] API REST completa en formato JSON

#### ✅ Tarea 4: CRUD de Cursos
- [x] Crear cursos con validación
  - Nombre del curso (requerido, único)
  - Intensidad horaria (requerido, número entero positivo)
  - Descripción (opcional)
- [x] Listar todos los cursos
- [x] Ver detalles de curso con alumnos inscritos
- [x] Editar información de cursos
- [x] Eliminar cursos (con confirmación)
- [x] Contador de alumnos por curso
- [x] API REST completa en formato JSON

#### ✅ Tarea 5: Asignación de Cursos
- [x] Asignar múltiples cursos a un usuario
- [x] Prevención de asignaciones duplicadas
- [x] Ver historial de asignaciones
- [x] Eliminar asignaciones existentes
- [x] Interfaz intuitiva de selección
- [x] Validación de datos
- [x] API REST completa en formato JSON

### 🎁 Bonificaciones Completadas

#### ✅ Uso de Bootstrap
- [x] Bootstrap 5.3 implementado
- [x] Diseño responsivo en todos los dispositivos
- [x] Componentes personalizados:
  - Tarjetas (Cards)
  - Tablas responsivas
  - Modales
  - Formularios estilizados
  - Alertas y notificaciones
  - Navegación
  - Badges y botones

#### ✅ Validación de Formularios
- [x] Validación en backend (Laravel Requests)
- [x] Validación en frontend (JavaScript)
- [x] Mensajes de error personalizados
- [x] Validación en tiempo real
- [x] Indicadores visuales de error
- [x] Prevención de envíos duplicados

#### ✅ Repositorio GIT
- [x] Proyecto subido a GitHub
- [x] README.md completo y detallado
- [x] Commits organizados y descriptivos
- [x] .gitignore configurado correctamente
- [x] Estructura de carpetas limpia

---

## 🔒 Validaciones

### Validaciones de Usuario

```php
// UserRequest.php
[
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users,email,' . $userId,
    'phone' => 'required|string|max:20',
    'password' => 'required|min:8|confirmed', // Solo en creación
    'role' => 'required|in:admin,student'
]
```

**Mensajes de Error:**
- "El nombre es obligatorio"
- "El email debe ser una dirección válida"
- "Este email ya está registrado"
- "El teléfono es obligatorio"
- "La contraseña debe tener al menos 8 caracteres"
- "Las contraseñas no coinciden"
- "El rol debe ser administrador o alumno"

### Validaciones de Curso

```php
// CourseRequest.php
[
    'name' => 'required|string|max:255|unique:courses,name,' . $courseId,
    'hours' => 'required|integer|min:1|max:1000',
    'description' => 'nullable|string|max:1000'
]
```

**Mensajes de Error:**
- "El nombre del curso es obligatorio"
- "Este curso ya existe"
- "La intensidad horaria debe ser un número"
- "La intensidad debe ser al menos 1 hora"
- "La intensidad no puede superar 1000 horas"
- "La descripción no puede superar 1000 caracteres"

### Validaciones de Asignación

```php
// AssignmentRequest.php
[
    'user_id' => 'required|exists:users,id',
    'course_ids' => 'required|array|min:1',
    'course_ids.*' => 'exists:courses,id'
]
```

**Mensajes de Error:**
- "Debe seleccionar un usuario"
- "El usuario seleccionado no existe"
- "Debe seleccionar al menos un curso"
- "Uno o más cursos seleccionados no existen"

### Validaciones de Login

```php
// AuthRequest.php
[
    'email' => 'required|email',
    'password' => 'required|min:8'
]
```

**Mensajes de Error:**
- "El email es obligatorio"
- "Ingrese un email válido"
- "La contraseña es obligatoria"
- "Credenciales incorrectas"

---

## 🔐 Seguridad

### Medidas Implementadas

#### 🛡️ Autenticación
- **Hashing de Contraseñas**: Bcrypt con factor de costo 10
- **Tokens de Sesión**: Laravel Sanctum para API
- **CSRF Protection**: Tokens CSRF en formularios web
- **Session Management**: Gestión segura de sesiones

#### 🔒 Autorización
- **Middleware de Roles**: Verificación de permisos por ruta
- **Policy Classes**: Políticas de acceso granular
- **Route Protection**: Rutas protegidas por autenticación

#### 🚫 Prevención de Ataques
- **SQL Injection**: Eloquent ORM con consultas preparadas
- **XSS**: Escape automático en Blade templates
- **CSRF**: Protección CSRF en formularios
- **Mass Assignment**: Protección con `$fillable` y `$guarded`

#### 📝 Validación de Datos
- **Input Validation**: Validación completa en backend
- **Type Casting**: Conversión segura de tipos de datos
- **Sanitization**: Limpieza de entrada de usuario

#### 🔑 Gestión de Credenciales
- **Environment Variables**: Credenciales en archivo .env
- **.env en .gitignore**: Prevención de exposición de secrets
- **Key Rotation**: Facilidad para rotar claves de aplicación

---

## 🧩 Características Adicionales

### 📊 Dashboard con Estadísticas

#### Dashboard Administrador
- 📈 Total de usuarios registrados
- 📚 Total de cursos disponibles
- 🔗 Total de asignaciones activas
- 📊 Gráficos de distribución
- 🎯 Cursos más populares
- 👥 Usuarios más activos

#### Dashboard Alumno
- 📚 Mis cursos asignados
- ⏰ Total de horas de estudio
- 🎓 Progreso de cursos
- 📅 Calendario de actividades

### 🔍 Sistema de Búsqueda y Filtros

#### Filtros de Usuarios
- 🔎 Búsqueda por nombre
- 📧 Búsqueda por email
- 👤 Filtrar por rol (Admin/Alumno)
- 📅 Ordenar por fecha de registro
- 🔢 Paginación automática

#### Filtros de Cursos
- 🔎 Búsqueda por nombre
- ⏰ Filtrar por intensidad horaria
- 👥 Ordenar por número de alumnos
- 📅 Ordenar por fecha de creación

### 🎨 Interfaz de Usuario

#### Características UI/UX
- ✨ Diseño moderno y limpio
- 📱 100% Responsive (móvil, tablet, desktop)
- 🎭 Tema consistente con colores corporativos
- 🔔 Notificaciones toast para acciones
- ⚡ Animaciones suaves
- 🖱️ Hover effects en elementos interactivos
- 📋 Tooltips informativos
- ⌨️ Atajos de teclado (en formularios)

#### Componentes Personalizados
- 🎴 Cards con información resumida
- 📊 Tablas con DataTables
- 🔘 Botones con estados (loading, disabled)
- 🔲 Modales de confirmación
- 📝 Formularios con validación visual
- 🏷️ Badges para estados
- 📑 Paginación estilizada

### 🚀 Optimizaciones

#### Performance
- ⚡ Carga diferida (Lazy Loading)
- 💾 Caché de consultas frecuentes
- 🗜️ Compresión de assets
- 📦 Optimización de imágenes
- 🔄 AJAX para operaciones sin recargar página

#### Base de Datos
- 🔍 Índices en campos de búsqueda frecuente
- 🔗 Eager Loading para relaciones
- 📊 Optimización de consultas N+1
- 🗄️ Migraciones versionadas

---

## 📚 Documentación Adicional

### 🔧 Comandos Artisan Útiles

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Generar nuevo usuario admin
php artisan tinker
>>> User::create(['name'=>'Admin', 'email'=>'admin@test.com', 'password'=>Hash::make('password'), 'role'=>'admin', 'phone'=>'123456789']);

# Ver rutas disponibles
php artisan route:list

# Refrescar base de datos
php artisan migrate:fresh --seed

# Generar backup de base de datos
php artisan db:backup

# Ver logs en tiempo real
tail -f storage/logs/laravel.log
```

### 🐛 Debugging

#### Activar Debug Mode

En `.env`:
```env
APP_DEBUG=true
LOG_LEVEL=debug
```

#### Ver Logs
```bash
# Ver últimas líneas del log
tail -n 50 storage/logs/laravel.log

# Seguir log en tiempo real
tail -f storage/logs/laravel.log
```

#### Laravel Telescope (Opcional)

```bash
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate
```

Acceder a: `http://localhost:8000/telescope`

---

## 🔄 Workflow de Desarrollo

### Ciclo de Desarrollo

```
1. 📝 Crear rama feature
   git checkout -b feature/nueva-funcionalidad

2. 💻 Desarrollar funcionalidad
   - Escribir código
   - Probar localmente
   - Validar con Postman

3. ✅ Commit cambios
   git add .
   git commit -m "feat: agregar nueva funcionalidad"

4. 🔀 Merge a develop
   git checkout develop
   git merge feature/nueva-funcionalidad

5. 🚀 Deploy a producción
   git checkout main
   git merge develop
   git push origin main
```

### Convenciones de Commits

```
feat: Nueva funcionalidad
fix: Corrección de bug
docs: Cambios en documentación
style: Cambios de formato (sin afectar código)
refactor: Refactorización de código
test: Agregar o modificar tests
chore: Tareas de mantenimiento
```

---
## 🤝 Contribución

### Cómo Contribuir

1. **Fork** el repositorio
2. Crea tu **feature branch** (`git checkout -b feature/AmazingFeature`)
3. **Commit** tus cambios (`git commit -m 'feat: Add some AmazingFeature'`)
4. **Push** a la branch (`git push origin feature/AmazingFeature`)
5. Abre un **Pull Request**

### Guía de Estilo

- Seguir PSR-12 para código PHP
- Usar nombres descriptivos para variables y funciones
- Comentar código complejo
- Mantener funciones pequeñas y específicas
- Escribir tests para nuevas funcionalidades

---

---

## 📞 Contacto y Soporte

### Autor

👤 **Juan Sebastian Aley Pabon**

- 📧 Email: juaaley250@gmail.com
- 🐱 GitHub: https://github.com/Juan-sebastian1763

### Reportar Problemas

Si encuentras algún bug o tienes una sugerencia, por favor:

1. Verifica que el problema no haya sido reportado antes en [Issues](https://github.com/Juan-sebastian1763/student-managment-prueba/issues)
2. Abre un nuevo issue con:
   - Descripción clara del problema
   - Pasos para reproducirlo
   - Comportamiento esperado vs comportamiento actual
   - Screenshots (si aplica)
   - Versión de PHP, Laravel y navegador

---

## 🙏 Agradecimientos

- Laravel Framework Team
- Bootstrap Team
- Comunidad de Stack Overflow
- Todos los contribuidores del proyecto

---

## 📊 Estado del Proyecto

![Status](https://img.shields.io/badge/Status-Complete-success?style=for-the-badge)
![Version](https://img.shields.io/badge/Version-1.0.0-blue?style=for-the-badge)
![Laravel](https://img.shields.io/badge/Laravel-10.x-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.1+-purple?style=for-the-badge&logo=php)

---

## 🗺️ Roadmap

### ✅ Versión 1.0 (Actual)
- [x] Sistema de autenticación
- [x] CRUD completo de usuarios
- [x] CRUD completo de cursos
- [x] Sistema de asignaciones
- [x] API REST completa
- [x] Interfaz responsiva

### 🔮 Versión 1.1 (Próxima)
- [ ] Sistema de notificaciones por email
- [ ] Exportación de reportes (PDF/Excel)
- [ ] Dashboard con gráficos interactivos
- [ ] Historial de cambios (auditoría)
- [ ] Sistema de comentarios en cursos

### 🚀 Versión 2.0 (Futuro)
- [ ] Módulo de evaluaciones y calificaciones
- [ ] Sistema de certificados
- [ ] Chat en tiempo real
- [ ] Integración con plataformas LMS
- [ ] App móvil (Flutter/React Native)

---

## 💡 FAQ - Preguntas Frecuentes

### ¿Cómo reseteo mi contraseña?
Actualmente el sistema no tiene recuperación de contraseña. Un admin debe cambiarla desde el panel.

### ¿Puedo cambiar mi rol de alumno a admin?
No, solo un administrador existente puede cambiar roles de usuarios.

### ¿Cuántos cursos puedo asignar a un usuario?
No hay límite, puedes asignar todos los cursos disponibles.

### ¿Los datos se guardan automáticamente?
Sí, cada vez que haces un cambio se guarda inmediatamente en la base de datos.


---



### Alumno 1

```
📧 Email: alumno1@example.com
🔑 Password: password
👤 Rol: Alumno
```

**Permisos:**
- ✅ Ver cursos asignados

### Alumno 2

```
📧 Email: alumno2@example.com
🔑 Password: password
👤 Rol: Alumno
```

