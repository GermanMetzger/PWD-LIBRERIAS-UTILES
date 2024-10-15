<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/header&footer.css">
    <link rel="stylesheet" href="../../../assets/css/formulario.css">
    <title>HOME</title>
</head>

<body>
    <header>
        <?php
        include_once("../../utils/functions.php");
        include_once('../../../assets/structure/header.php');
        ?>

        <h1>HOME</h1>
        <nav>
            <a href="../../../index.php">
                <h3 onclick=desloguear()>Desloguear</h3>
            </a>
        </nav>

    </header>
    <div class="container">
        <script></script>


        <main>
            <div class="centro">
                <h1>Información del Usuario</h1>
                <p>Nombre: <span id="name"></span></p>
                <p>Email: <span id="email"></span></p>
                <p>Contraseña: <span id="password"></span></p>

                <script>
                    var name = sessionStorage.getItem('name');
                    var email = sessionStorage.getItem('email');
                    var password = sessionStorage.getItem('password');

                    // Muestra los valores en el HTML
                    document.getElementById('name').textContent = name;
                    document.getElementById('email').textContent = email;
                    document.getElementById('password').textContent = password;
                </script>
            </div>
        </main>

        <?php
        include_once('../../../assets/structure/footer.php');
        ?>
    </div>
    <script>
        function desloguear() {
            sessionStorage.removeItem('email');
            sessionStorage.removeItem('name');
            sessionStorage.removeItem('password');
        }
    </script>
</body>

</html>