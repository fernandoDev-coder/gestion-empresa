<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
</head>

<body>
    <h1>Editar Empleado</h1>
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $empleado->nombre }}" required>
        <br>
        <label for="primer_apellido">Primer Apellido:</label>
        <input type="text" name="primer_apellido" value="{{ $empleado->primer_apellido }}" required>
        <br>
        <label for="segundo_apellido">Segundo Apellido:</label>
        <input type="text" name="segundo_apellido" value="{{ $empleado->segundo_apellido }}">
        <br>
        <label for="rol">Rol:</label>
        <input type="text" name="rol" value="{{ $empleado->rol }}" required>
        <br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="{{ $empleado->fecha_nacimiento }}" required>
        <br>
        <label for="dni">DNI:</label>
        <input type="text" name="dni" value="{{ $empleado->dni }}" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $empleado->email }}" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <br>
    <a href="{{ route('oficinas.empleados.index', $empleado->oficina_id) }}">Volver al listado de empleados</a>
</body>

</html>
