<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/header&footer.css">
    <link rel="stylesheet" href="../../assets/css/formulario.css">
    <title>LOGIN</title>
</head>

<body>
    <header>
        <h1>LOGIN</h1>
        <nav>
            <a href="../../index.php">
                <h3>Volver</h3>
            </a>
        </nav>

    </header>
    <div class="container">
        <?php
        include_once('../../assets/structure/header.php');
        ?>

        <main>
            <div class="centro">

                <form action="actions/verificacionAction.php" class="form-container">
                    <!-- envio por oculto el tipo de verificacion que quiero usar -->
                    <input type="hidden" name="tipoVerificacion" value='2'>
                    <!-- -------------------------------------------------------- -->
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">

                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">

                    <input type="submit" value="LogIn">

                </form>
                <a href="register.php">Registrarse</a><br>
                <a href="lostPassword.php">¿Olvidaste tu contraseña?</a>

            </div>
        </main>

        <?php
        include_once('../../assets/structure/footer.php');
        ?>

    </div>

</body>

</html>