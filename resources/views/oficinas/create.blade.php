<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Oficina</title>
</head>

<body>
    <h1>Crear Oficina</h1>
    <form action="{{ route('oficinas.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
    <br>
    <a href="{{ route('oficinas.index') }}">Volver al listado de oficinas</a>
</body>

</html>
