<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/header&footer.css">

    <title>LIBRERIAS UTILES</title>
</head>

<body>
    <header>
        <h1>LOGIN</h1>
        <nav>
            <ul>
                <li><a href="./app/views/logIn.php">Loguear</a></li>
                <li><a href="./app/views/register.php">Registrar</a></li>
                <li><a href="./app/views/lostPassword.php">¿Olvidaste tu contraseña?</a></li>
            </ul>
        </nav>

    </header>
    <div class="container">
        <?php
        include_once("./config.php");
        include_once('assets/structure/header.php');
        ?>

        <main>
            <div class="pres">
                <h1> PROGRAMACION WEB DINAMICA (LIBRERIAS UTILES)</h1><br>

                <p> Proyecto para la materia PWD, entrega de Trabajos Librerias utiles desarrolladas en grupo.</p>


                <h2> Integrantes</h2>
                <ul>

                    <li>[<a href="https://github.com/MartinCba">@MartinCba</a>]</li>
                    <li>[<a href="https://github.com/GermanMetzger">@GermanMetzger</a>]</li>
                    <li> [<a href="https://github.com/Martin-VillegasReibold">@Martin-VillegasReibold</a>]</li>
                </ul>


            </div>

        </main>

        <?php
        include_once('assets/structure/footer.php');
        ?>
    </div>

</body>

</html>