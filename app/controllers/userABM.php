<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMAILER/PHPMailer.php';
require 'PHPMAILER/Exception.php';
require 'PHPMAILER/SMTP.php';
include_once("../../models/user.php");

class userAbm{
    public function mandarCodigo($email){
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
        
            //Recipients
            $mail->setFrom('TP5@WPD.com', 'TP5 PWD');
            $mail->addAddress($email, 'Tp5pwd');     //Add a recipient

            // creacion de codigo
            function generarCodigoVerificacion($longitud = 10) {
                $caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $codigo = '';
                $max = strlen($caracteres) - 1;
            
                for ($i = 0; $i < $longitud; $i++) {
                    $codigo .= $caracteres[random_int(0, $max)];
                }
            
                return $codigo;
            }

            $html = generarCodigoVerificacion();
        
        
        
            //Content
            $mail->isHTML(true); 
            $mail->Subject = 'Codigo de verificacion';
            $mail->Body    = $html;

            $retorno = [
                "codigo" => $html,
                "mailEnviado" => $mail->send(),
                "mailError" => $mail->ErrorInfo
            ];
        
        
            
        } catch (Exception $e) {
            //nada
        }

        return $retorno;
        
    }







    public function createUser($username, $password, $email){
        $registrado = false;
        $user = new User();
        $user->setear($email, $username, $password);
        if($user->insertar()){
            $registrado = true;
        }
        return $registrado;
    }






}
