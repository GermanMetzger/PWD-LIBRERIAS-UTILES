<?php
include_once("../../utils/functions.php");

$datos = dataSubmitted();
print_r($datos);
$userAbm = new userAbm();


switch ($datos["tipoVerificacion"]) {
        //crear cuenta nueva
    case 1:
        //codigo correcto
        if ($datos["codigo"] == $datos["codigoSV"]) {
            //primero verifico que el mail NO existe
            if ($userAbm->createUser($datos["name"], $datos["password"], $datos["email"])) {
?>
                <title>Redireccionando...</title>
                <script>
                    alert("Registrado correctamente. por favor inicie sesión!")
                    window.location.href = "http://localhost/LogIn/app/views/login.php";
                </script>
            <?php
            };
        } else {
            ?>
            <script>
                alert("Error: codigo incorrecto")
                window.location.href = "http://localhost/LogIn/app/views/register.php";
            </script>
        <?php
        }



        break;
        //validar usuario
    case 2:
        //primero verifico que el mail existe
        if ($userAbm->usuarioExiste($datos["email"])) {
            //busco el nombre 
            $user = $userAbm->obtenerDatosUserPorMail($datos["email"])
        ?>
            <script>
                const email = <?php echo json_encode($user["mail"]); ?>;
                const name = <?php echo json_encode($user["nombre"]); ?>;
                const password = <?php echo json_encode($user["contraseña"]); ?>;
                if (sessionStorage.getItem('email') == null) {
                    alert("holaa!");
                    sessionStorage.setItem('email', email);
                    sessionStorage.setItem('name', name);
                    sessionStorage.setItem('password', password);
                }
                window.location.href = "http://localhost/LogIn/app/views/actions/homeAction.php";
            </script>
<?php
        }
        break;
}
