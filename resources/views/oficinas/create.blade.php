<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Oficina</title>
    <link rel="stylesheet" href="{{ asset('css/campostyles.css') }}">
</head>

<body>

    <header>
        <h1>Crear Nueva Oficina</h1>
    </header>

    <div class="container">
        <div class="content">
            <form action="{{ route('oficinas.store') }}" method="POST" class="form">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la Oficina:</label>
                    <input type="text" id="nombre" name="nombre" required class="input">
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" class="input">
                </div>

                <button type="submit" class="button">Guardar</button>
                <a href="{{ route('oficinas.index') }}" class="button">Volver a la lista</a>
            </form>
        </div>
    </div>

</body>

</html>
