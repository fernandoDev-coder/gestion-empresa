<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="{{ asset('css/campostyles.css') }}">
</head>

<body>

    <header>
        <h1>Editar Empleado: {{ $empleado->nombre }}</h1>
    </header>

    <div class="container">
        <div class="content">
            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                @csrf
                @method('PUT')

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $empleado->nombre) }}"
                    required>
                <br>

                <label for="apellido_primero">Apellido Primero:</label>
                <input type="text" id="apellido_primero" name="apellido_primero"
                    value="{{ old('apellido_primero', $empleado->apellido_primero) }}" required>
                <br>

                <label for="apellido_segundo">Apellido Segundo:</label>
                <input type="text" id="apellido_segundo" name="apellido_segundo"
                    value="{{ old('apellido_segundo', $empleado->apellido_segundo) }}">
                <br>

                <label for="rol">Rol:</label>
                <input type="text" id="rol" name="rol" value="{{ old('rol', $empleado->rol) }}">
                <br>

                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                    value="{{ old('fecha_nacimiento', $empleado->fecha_nacimiento) }}">
                <br>

                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" value="{{ old('dni', $empleado->dni) }}" required>
                <br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $empleado->email) }}"
                    required>
                <br>

                <!-- Campo oculto para el ID de la oficina -->
                <input type="hidden" name="oficina_id" value="{{ $empleado->oficina_id }}">

                <button type="submit">Guardar Cambios</button>
            </form>

            <button type="button" class="button"
                onclick="window.location.href='{{ route('oficinas.show', ['oficina' => $empleado->oficina_id]) }}'">Volver
                a la oficina</button>
        </div>

</body>

</html>
