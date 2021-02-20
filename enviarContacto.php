<?php

include ('claseDB.php');
if(isset($_POST['nombre'])) {

    // Envío a gmail
    $nombre = $_POST['nombre'];
    $mail = $_POST['email'];
    $empresa = $_POST['mensaje'];

    $header = 'From: ' . $mail . " \r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/plain";

    $mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
    $mensaje .= "Su e-mail es: " . $mail . " \r\n";
    $mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
    $mensaje .= "Enviado el " . date('d/m/Y', time());

    $para = 'mrubio.psico@gmail.com';
    $asunto = 'Mensaje de mi sitio web';

    mail($para, $asunto, utf8_decode($mensaje), $header);
    // Hago un array conl os datos para el objeto Contacto
    $arrayContacto =array('nombre' => $_POST['nombre'], 
    'email' => $_POST['email'], 
    'asunto' => $_POST['asunto'],
    'mensaje' => $_POST['mensaje']);
    DB::graboContacto($arrayContacto);

    

    
    
}