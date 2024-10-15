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
        <nav>
            <a href="../../index.php"><h3>Volver</h3></a>
        </nav>

    </header>
    <div class="container">
        <?php
        include_once('../../assets/structure/header.php');
        ?>

        <main>
            <div class="centro">

                <form action="actions/recuperacionAction.php" class="form-container" method="POST">
                    <!-- envio por oculto el tipo de verificacion -->
                    <input type="hidden" name="tipoVerificacion" value='2'>
                    <!-- ---------------------------------------- -->
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                    
                    <input type="submit" value="Enviar">
                    
                </form>


            </div>
        </main>

        <?php
        include_once('../../assets/structure/footer.php');
        ?>
    </div>
</body>

</html>