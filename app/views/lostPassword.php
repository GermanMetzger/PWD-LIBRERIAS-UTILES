<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/header&footer.css">
    <link rel="stylesheet" href="../../assets/css/formulario.css">
    <title>RESTABLECER CONTRASEÑA</title>
</head>

<body>
    <header>
        <h1>RESTABLECER CONTRASEÑA</h1>

    </header>
    <div class="container">
        <?php
        include_once('../../assets/structure/header.php');
        ?>

        <main>
            <div class="centro">

                <form action="actionLost.php" class="form-container">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                    
                    <input type="submit" value="Enviar">
                    
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