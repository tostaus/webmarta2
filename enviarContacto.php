<?php

include ('claseDB.php');
if(isset($_POST['nombre'])) {
    // Hago un array conl os datos para el objeto Contacto
    $arrayContacto =array('nombre' => $_POST['nombre'], 
    'email' => $_POST['email'], 
    'asunto' => $_POST['asunto'],
    'mensaje' => $_POST['mensaje']);
    DB::graboContacto($arrayContacto);
    
    
}