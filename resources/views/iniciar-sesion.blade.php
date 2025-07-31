<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="shortcut icon" href="../imagenes/logo.png" sizes="64x64" />
    @vite('resources/css/login.css')
</head>
<body>
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <center><img class="mb-4" src="{{ asset('login_img/logo1.png') }}" alt="" width="200" height="200"></center> 

            <div class="inputbox">
                <input type="text" name="email" id="email" autocomplete="email" required>
                <label>Correo electronico</label>
            </div>
            <div class="inputbox">
                <input type="password" name="password" id="password" autocomplete="current-password" required>
                <label>Contraseña</label>
            </div>
            <div class="forget">
                <label><input type="checkbox" name="remember-me"> Recordarme</label>
                <a href="#">Haz olvidado tu contraseña?</a>
            </div>
            <button type="submit">Acceder</button>
            <div class="register">
                <p>No tienes una cuenta? <a href="{{ route('register') }}">Crea una aquí</a></p>
            </div>
        </form>
    </div>
</body>
</html>