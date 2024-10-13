<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/header&footer.css">
    <link rel="stylesheet" href="../../../assets/css/formulario.css">
    <title>VERIFICACION</title>
</head>

<body>
    <header>
        <h1>VERIFICACION</h1>

    </header>
    <div class="container">
        <?php
        include_once("../../utils/functions.php");
        include_once('../../../assets/structure/header.php');
        ?>
        
        <main>

        <div class="centro">
            <h2>Por favor verifica tu email para completar la verificacion.</h2>
            <form action="verificacionAction" method="post">
                <label for="codigo">Codgio:</label>
                <input type="text" name="codigo" id="codigo">
                <input type="submit" value="Enviar">
            </form>
        </div>


        </main>

        <?php
        include_once('../../../assets/structure/footer.php');
        ?>
    </div>
</body>

</html>
<?php

$datos = dataSubmitted();
$mail = $datos['email'];
$nombre = $datos['name'];
$contraseña = $datos['password'];

$user = new userAbm();
$datos = $user->mandarCodigo($mail);
//mail enviado correctamente
if($datos["mailEnviado"]){
    echo $datos["codigo"];


}else{
    echo "Error al enviar:".$datos["mailError"];
}

?>