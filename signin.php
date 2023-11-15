<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Restaurante delicioso</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body class="body-container-login">
    <div class="login-container">
        <!-- Agrega el botón de ir a la página de inicio (home) -->
        <a href="home.html" class="back-button">Volver a Inicio</a>
        <h2 class="second-title-login">Log in</h2>
        <form class="login-form" action="procesar-login.php" method="post">
            <label class="label-class-login" for="username">User:</label>
            <input class="input-login" type="text" id="username" name="username" required>
            <label class="label-class-login" for="password">Password:</label>
            <input class="input-login" type="password" id="password" name="password" required>
            <button class="button-login" type="submit">Log in</button>
        </form>
    </div>
</body>
</html>
