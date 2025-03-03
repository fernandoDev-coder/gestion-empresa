<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Oficina</title>
</head>

<body>
    <h1>Editar Oficina</h1>
    <form action="{{ route('oficinas.update', $oficina->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $oficina->nombre }}" required>
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="{{ $oficina->direccion }}" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <br>
    <a href="{{ route('oficinas.index') }}">Volver al listado de oficinas</a>
</body>

</html>
