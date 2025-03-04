<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Oficina</title>
    <link rel="stylesheet" href="{{ asset('css/campostyles.css') }}">
</head>

<body>

    <header>
        <h1>Detalles de la Oficina</h1>
    </header>

    <div class="container">
        <div class="content">
            <!-- Nombre de la oficina -->
            <h2>{{ $oficina->nombre }}</h2>

            <!-- Información de la oficina -->
            <div class="details">
                <p><strong>ID:</strong> {{ $oficina->id }}</p>
                <p><strong>Nombre:</strong> {{ $oficina->nombre }}</p>
            </div>

            <!-- Mostrar empleados -->
            <div class="empleados">
                <h3>Empleados:</h3>
                @if ($oficina->empleados->isEmpty())
                    <p>No hay empleados asignados a esta oficina.</p>
                @else
                    <ul>
                        @foreach ($oficina->empleados as $empleado)
                            <li>
                                <!-- Hacer clic sobre el nombre llevará a la página de edición del empleado -->
                                <a href="{{ route('empleados.edit', $empleado) }}">
                                    {{ $empleado->nombre }} - {{ $empleado->rol }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- Botón para agregar empleados -->
            <a href="{{ route('empleados.create', ['oficina' => $oficina->id]) }}" class="button">
                Agregar Empleado
            </a>

            <!-- Botón para volver a la lista de oficinas -->
            <a href="{{ route('oficinas.index') }}" class="button">
                Volver a la lista de oficinas
            </a>
        </div>
    </div>

</body>

</html>
