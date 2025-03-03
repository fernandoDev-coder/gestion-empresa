<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Empleado</title>
</head>

<body>
    <h1>Crear Empleado</h1>

    <!-- Formulario para crear un empleado -->
    <form action="{{ route('oficinas.empleados.store', $oficina) }}" method="POST">
        @csrf

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="primer_apellido">Primer Apellido:</label>
        <input type="text" name="primer_apellido" required><br>

        <label for="segundo_apellido">Segundo Apellido:</label>
        <input type="text" name="segundo_apellido"><br>

        <label for="rol">Rol:</label>
        <input type="text" name="rol"><br>

        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento"><br>

        <label for="dni">DNI:</label>
        <input type="text" name="dni" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('oficinas.empleados.index', $oficina) }}">Volver a la lista de empleados</a>
</body>

</html>
