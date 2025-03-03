<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
</head>

<body>
    <h1>Editar Empleado</h1>

    <!-- Formulario para editar un empleado -->
    <form action="{{ route('oficinas.empleados.update', [$oficina, $empleado]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" required>
        <br>

        <label for="primer_apellido">Primer Apellido:</label>
        <input type="text" name="primer_apellido" value="{{ old('primer_apellido', $empleado->primer_apellido) }}"
            required>
        <br>

        <label for="segundo_apellido">Segundo Apellido:</label>
        <input type="text" name="segundo_apellido"
            value="{{ old('segundo_apellido', $empleado->segundo_apellido) }}">
        <br>

        <label for="rol">Rol:</label>
        <input type="text" name="rol" value="{{ old('rol', $empleado->rol) }}" required>
        <br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $empleado->fecha_nacimiento) }}"
            required>
        <br>

        <label for="dni">DNI:</label>
        <input type="text" name="dni" value="{{ old('dni', $empleado->dni) }}" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $empleado->email) }}" required>
        <br>

        <button type="submit">Actualizar</button>
    </form>

    <br>

    <!-- Enlace para volver al listado de empleados de la oficina -->
    <a href="{{ route('oficinas.empleados.index', $oficina) }}">Volver al listado de empleados</a>
</body>

</html>
