<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="../img/favicon.jpg" />
    <title>Recuperar password</title>
</head>

<body>
    <?php
    include_once('../structure/header.php');
    include_once('../../utils/functions.php');
    include_once("../../../config.php");
    $datos = dataSubmitted();
    $mail = $datos['email'];
    $userAbm = new userAbm();
    $existe = $userAbm->usuarioExiste($mail);
    if ($existe) {
        //mail enviado correctamente
        $mail = $userAbm->mandarCodigo($mail, "codigo");
    }
    ?>

    <main>
        <div class="container card-container d-flex justify-content-center align-items-center" style="height: 80vh">
            <div class="card text-center bg-dark text-light" style="width: 68rem;">
                <div class="card-header">
                    <img src="../img/PHPMailer.jpg" alt="logo" style="height: 50px;">
                    <h4>Recuperación de password</h4>
                </div>
                <div class="card-body">
                    <?php if ($existe): ?>
                        <!-- Si el mail ya existe, muestra el mensaje -->
                        <h5>Verifica tu email para completar la recuperación.</h5>
                        <form action="verificacionAction.php" method="post">
                            <!-- envio por oculto la información del usuario y el código de verificación -->
                            <input type="hidden" name="email" value='<?php echo $datos['email']; ?>'>
                            <input type="hidden" name="tipoVerificacion" value='3'>
                            <input type="hidden" name="codigoSV" value='<?php echo $mail["codigo"]; ?>'>
                            <!-- ----------------------------------------------------------------------- -->
                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-6 col-lg-4">
                                    <label for="codigo">Código:</label>
                                    <input type="text" class="form-control form-control-sm" name="codigo" id="codigo" required>
                                </div>
                            </div>
                            <div class="mb-3 row justify-content-center">
                                <div class="col-md-6 col-lg-4">
                                    <input type="submit" class="btn btn-warning btn-sm w-100" value="Enviar">
                                </div>
                            </div>
                        </form>
                    <?php else: ?>
                        <!-- Si el mail no existe, muestra el formulario -->
                        <h5>El email ingresado no existe</h5>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once('../structure/footer.php');
    ?>
</body>

</html>