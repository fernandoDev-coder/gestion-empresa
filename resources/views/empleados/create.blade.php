<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Añadir Empleado</title>
    <link rel="stylesheet" href="{{ asset('css/campostyles.css') }}">
</head>

<body>
    <header>
        <h1>Añadir Empleado a {{ $oficina->nombre }}</h1>
    </header>

    <div class="container">
        <div class="content">
            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="apellido_primero">Apellido Primero:</label>
                    <input type="text" id="apellido_primero" name="apellido_primero" required>
                </div>

                <div class="form-group">
                    <label for="apellido_segundo">Apellido Segundo:</label>
                    <input type="text" id="apellido_segundo" name="apellido_segundo">
                </div>

                <div class="form-group">
                    <label for="rol">Rol:</label>
                    <input type="text" id="rol" name="rol">
                </div>

                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
                </div>

                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="text" id="dni" name="dni" required>
                    <input type="text" id="dni" name="dni" required pattern="[0-9]{8}[A-Za-z]"
                        title="El DNI debe contener 8 números seguidos de una letra">
                    @error('dni')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required
                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                        title="El correo electrónico debe ser válido">
                    @error('email')
                        <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo oculto para el ID de la oficina -->
                <input type="hidden" name="oficina_id" value="{{ $oficina->id }}">

                <button type="submit" class="button">Guardar Empleado</button>
            </form>

            <a href="/oficinas/{{ $oficina->id }}" class="button">Volver a la lista</a>
        </div>
    </div>

</body>

</html>
