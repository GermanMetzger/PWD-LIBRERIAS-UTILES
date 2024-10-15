<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/header&footer.css">
    <link rel="stylesheet" href="../../../assets/css/formulario.css">
    <title>RECUPERACION</title>
</head>

<body>
    <header>

        <h1>RECUPERACION</h1>
        <nav>
            <a href="../../../index.php"><h3>Volver</h3></a>
        </nav>

    </header>
    <div class="container">
        <?php
        include_once("../../utils/functions.php");
        include_once('../../../assets/structure/header.php');


        $datos = dataSubmitted();
        $mail = $datos['email'];
        $userAbm = new userAbm();
        $existe = $userAbm->usuarioExiste($mail);
        if($existe){
            //mail enviado correctamente
            $mail = $userAbm->mandarCodigo($mail,"codigo");
        }


        ?>

        <main>
            <div class="centro">
                <?php if ($existe): ?>
                    <!-- Si el mail ya existe, muestra el mensaje -->
                    <h2>por favor verifica tu email para completar la verificación.</h2>
                    <form action="verificacionAction.php" method="post">
                        <!-- envio por oculto la información del usuario y el código de verificación -->
                        <input type="hidden" name="email" value='<?php echo $datos['email']; ?>'>
                        <input type="hidden" name="tipoVerificacion" value='3'>
                        <input type="hidden" name="codigoSV" value='<?php echo $mail["codigo"]; ?>'>
                        <!-- ----------------------------------------------------------------------- -->
                        <label for="codigo">Código:</label>
                        <input type="text" name="codigo" id="codigo">
                        <input type="submit" value="Enviar">
                    </form>
                <?php else: ?>
                    <!-- Si el mail no existe, muestra el formulario -->
                    <h2>El email ingresado no existe</h2>
                    
                <?php endif; ?>
            </div>
        </main>

        <?php
        include_once('../../../assets/structure/footer.php');
        ?>
    </div>
</body>

</html>