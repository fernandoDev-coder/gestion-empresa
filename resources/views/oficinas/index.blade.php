<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Oficinas</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <header>
        <h1>Lista de Oficinas</h1>
    </header>
    <div class="container">
        <div class="content">
            <a href="{{ route('oficinas.create') }}" class="button">Añadir Oficina</a>

            <ul class="oficinas-list">
                @foreach ($oficinas as $oficina)
                    <li>
                        <a href="{{ route('oficinas.show', $oficina) }}" class="oficina-item">
                            {{ $oficina->nombre }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</body>

</html>
