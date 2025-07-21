<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="shortcut icon" href="../imagenes/logo.png" sizes="64x64" />
    @vite('resources/css/register.css')
</head>
<body>
    <div class="container">
        <form action="registro_control.php" method="POST">
            <h2>Formulario de Registro</h2>

            <div class="inputbox">
                <input type="text" name="nombre" id="nombre" required>
                <label>Nombre Completo</label>
            </div>

            <div class="inputbox">
                <input type="email" name="correo" id="correo" required>
                <label>Correo Electrónico</label>
            </div>
            

            <div class="inputbox">
                <input type="password" name="clave" id="clave" required>
                <label>Contraseña</label>
            </div>

            <button type="submit">Registrar</button>

            <div class="login">
                <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Iniciar Sesión</a></p>
            </div>
        </form>
    </div>
</body>
</html>