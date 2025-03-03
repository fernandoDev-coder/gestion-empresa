<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Oficinas</title>
</head>

<body>
    <h1>Listado de Oficinas</h1>
    <a href="{{ route('oficinas.create') }}">Añadir Oficina</a>
    <ul>
        @foreach ($oficinas as $oficina)
            <li>
                {{ $oficina->nombre }} - {{ $oficina->direccion }}
                <a href="{{ route('oficinas.show', $oficina->id) }}">Ver Empleados</a>
                <a href="{{ route('oficinas.edit', $oficina->id) }}">Editar</a>
                <form action="{{ route('oficinas.destroy', $oficina->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>

</html>
