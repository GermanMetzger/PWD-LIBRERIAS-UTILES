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
    public function mandarCodigo($email,$tipo){
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

            if($tipo == "codigo"){
                $titulo = "Codigo de verificacion";
                $codigo = generarCodigoVerificacion();

                $html = <<<HTML
                <body>
                    <h1>Su codigo es: $codigo</h1>
                </body>
                HTML;

            }elseif($tipo == "contraseña"){
                $titulo = "Clave perdida";
                $user = $this->obtenerDatosUserPorMail($email);
                $clave = $user["contraseña"];
                $html = <<<HTML
                <body>
                    <h1>Su Contraseña es: $clave</h1>
                </body>
                HTML;
            }

            

        
        
        
            //Content
            $mail->isHTML(true); 
            $mail->Subject = $titulo;
            $mail->Body    = $html;
            if($mail->send()){
                $msg = "Codigo enviado correctamente";
            }else{
                $msg = "Error al enviar el Mail: ".$mail->ErrorInfo;
            }

            if($tipo == "codigo"){
                $retorno = [
                    "codigo" => $codigo,
                    "estado" => $msg
                ];
            }else{
                $retorno = $msg;
                
            }

        
        
            
        } catch (Exception $e) {
            //nada
        }

        return $retorno;
        
    }







    public function createUser($username, $password, $email){
        $registrado = false;
        $user = new user();
        $user->setear($email, $username, $password);
        if($user->insertar()){
            $registrado = true;
        }else{
            echo $user->getMsjOperacion();
        }
        return $registrado;
    }

    /**
     * Obtiene los datos de un usuario por su mail
     * @param string $mail
     * @return array|null
     */
    public function obtenerDatosUserPorMail($mail)
    {
        $parametro['mail'] = $mail;
        $info = $this->buscar($parametro);

        if (count($info) > 0) {
            $userEncontrado = $info[0];
            return [
                'mail' => $userEncontrado->getMail(),
                'nombre' => $userEncontrado->getNombre(),
                'contraseña' => $userEncontrado->getContraseña(),
            ];
        }

        return null;
    }

        /**
     * Permite buscar un objeto según distintos criterios
     * @param array $param
     * @return array
     */
    public function buscar($param)
    {

        /*Se incia la consulta sql en true por que facilita el armado de la misma
        según el criterio de busqueda */
        $where = " true ";

        if ($param <> NULL) {
            if (isset($param['mail']))
                $where .= " and mail = '" . $param['mail'] . "'";

            if (isset($param['nombre']))
                $where .= " and nombre = '" . $param['nombre'] . "'";

            if (isset($param['contraseña']))
                $where .= " and contraseña = " . $param['contraseña'];

        }

        $obj = new user();
        $arreglo = $obj->listar($where);

        return $arreglo;
    }

    /**
     *  deveulve true o false si el mail existe en la base de datos
     * @param string $param
     * @return bool
     */
    public function usuarioExiste($email){
        $usuario = $this->obtenerDatosUserPorMail($email);
        if (empty($usuario)) {
            $mailExistente = false;
        } else {
            $mailExistente = true;
        }

        return $mailExistente;
    }

}







