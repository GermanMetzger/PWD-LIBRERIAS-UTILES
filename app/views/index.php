<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/formulario.css">
    <title>CINEMA</title>
</head>

<?php
//$pelicula = $_POST["pelicula"];
$pelicula = "Volver al futuro";
?>
<body>
    <div class="centro">
        <h1><?php echo $pelicula;?></h1>
        <h2>$8300 x ticket</h2>
        <form action="actionMail.php" method="POST">
            <div class="form-container">
                <h2>DATOS <span>PERSONALES</span></h2>
                <input type="hidden" name="pelicula" value='<?php echo $pelicula;?>'>

                <div class="input-group">
                    <label for="username">Nombre y Apellido*</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="input-group">
                    <label for="mail">Email*</label>
                    <input type="email" id="mail" name="mail" required>
                </div>
                <div class="input-group">
                    <label for="mail">Tickets*</label>
                    <input type="number" id="cantidadTickets" name="cantidadTickets" required max="5" min="1" value="1">
                </div>


                <input type="submit" value="Enviar">
            </div>
        </form>


    </div>
    <?php if (isset($_GET['error'])) {
        echo "<p>" . $_GET['error'] . "</p>";
    } ?>

</body>

</html>