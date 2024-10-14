<?php
include_once("../../utils/functions.php");

$datos = dataSubmitted();
//print_r($datos);

//codigo correcto
if ($datos["codigo"] == $datos["codigoSV"]) {

    switch ($datos["tipoVerificacion"]) {
            //crear cuenta nueva
        case 1:

            $userABM = new userABM();

            //primero verifico que el mail NO existe

            if ($userABM->createUser($datos["name"], $datos["password"], $datos["email"])) {
                echo "Cuenta creada correctamente!";
            };



            break;
    }
} else {
    echo "Error: codigo incorrecto";
}
