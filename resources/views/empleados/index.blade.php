<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleados</title>
</head>
<body>
    <h1>Empleados en la oficina: {{ $oficina->nombre }}</h1>

    <!-- Enlace para crear un nuevo empleado -->
    <a href="{{ route('oficinas.empleados.create', $oficina) }}">Añadir Empleado</a>

    <ul>
        @foreach ($empleados as $empleado)
            <li>
                {{ $empleado->nombre }} - {{ $empleado->dni }}
                <a href="{{ route('oficinas.empleados.edit', [$oficina, $empleado]) }}">Editar</a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('oficinas.index') }}">Volver al listado de oficinas</a>
</body>
</html>
