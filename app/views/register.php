<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/header&footer.css">
    <link rel="stylesheet" href="../../assets/css/formulario.css">
    <title>REGISTRARSE</title>
</head>

<body>
    <header>
        <h1>REGISTRARSE</h1>

    </header>
    <div class="container">
        <?php
        include_once('../../assets/structure/header.php');
        ?>

        <main>
            <div class="centro">

                <form action="./actions/registerAction.php" class="form-container" method="POST">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">

                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name">

                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password">

                    <label for="password2">Repetir Contraseña:</label>
                    <input type="password" name="password2" id="password2">
                    
                    <input type="submit" value="Registrar">
                    
                </form>
                <a href="logIn.php">Volver</a><br>


            </div>
        </main>

        <?php
        include_once('../../assets/structure/footer.php');
        ?>
    </div>
</body>

</html>