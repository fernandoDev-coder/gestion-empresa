<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Oficina: {{ $oficina->nombre }}</title>
</head>
<body>
    <h1>Detalles de la Oficina: {{ $oficina->nombre }}</h1>

    <p><strong>Nombre de la oficina:</strong> {{ $oficina->nombre }}</p>
    <p><strong>Dirección:</strong> {{ $oficina->direccion ?? 'No especificada' }}</p>

    <h2>Empleados de la Oficina:</h2>
    <ul>
        @foreach ($empleados as $empleado)
            <li>{{ $empleado->nombre }} - {{ $empleado->dni }}</li>
        @endforeach
    </ul>

    <a href="{{ route('oficinas.index') }}">Volver al listado de oficinas</a>

    <!-- Botón para agregar un nuevo empleado -->
    <br><br>
    <a href="{{ route('oficinas.create', $oficina) }}">
        <button>Añadir Empleado</button>
    </a>

</body>
</html>
