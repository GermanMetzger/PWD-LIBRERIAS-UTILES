<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMAILER/Exception.php';
require 'PHPMAILER/PHPMailer.php';
require 'PHPMAILER/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                             
    $mail->SMTPDebug  = 0;                                       
    $mail->SMTPAuth   = true;                                    
    $mail->Host       = 'smtp.gmail.com';                        
    $mail->Username   =  "metzgergerman@gmail.com"; //
    $mail->Password   =  "fpciybttqmqsnbzs";
    $mail->Port       = 587;  


$nombre = $_POST["username"];
$email = $_POST["mail"];
$numeroTransaccion = rand(100000000, 999999999);
$codigo = "WMDWKJB";
$complejo = "CINEMA NQN";
$fecha = date("Y-m-d");
$hora = date("H:i:s");
$cantidadTickets = $_POST["cantidadTickets"];
$precioTotal = 8300*$cantidadTickets;
$nombrePelicula = $_POST["pelicula"];

$html = "";


$html = <<<HTML
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="mail">
        <h1>Hola $nombre</h1><br>
        <p>Gracias por utilizar nuestro sistema de compra de tickets por internet.</p><br>  

        <div class="info">
            <ul>
                <li>Número de transacción: <strong> $numeroTransaccion</strong></li>
                <li>Codigo de operacion: <h2> $codigo</h2></li>
                <li>Complejo: <strong> $complejo</strong></li>
                <li>Fecha: <strong> $fecha</strong></li>
                <li>hora:<strong>  $hora</strong></li>
                <li>Tickets: <strong> $cantidadTickets</strong></li>
            </ul><br>
        </div>
        <h2>Total: <strong>$$precioTotal</strong></h2><br><br>
        <h2>Muchas gracias por tu compra, ¡y que disfrutes tu película!</h2>
    </div>


</body>
HTML;


    //Recipients
    $mail->setFrom('CINEMA@GM.com', 'GM');
    $mail->addAddress($email, 'German Metzger');     //Add a recipient



    //Content
    $mail->isHTML(true); 
    $mail->Subject = '* Confirmacion de su operacion '.$complejo.' '.$nombrePelicula.' Cast';
    $mail->Body    = $html;


    $mail->send();
    echo 'Enviado Correctamente';
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}
?>
