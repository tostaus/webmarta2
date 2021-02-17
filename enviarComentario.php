<?php

include ('claseDB.php');
if(!isset($_POST['fecha'])){
    $fecha= date("Y-m-d");

}else{
    $fecha=$_POST['fecha'];
}
if(isset($_POST['nombre'])) {
    // Hago un array conl os datos para el objeto Contacto
    $arrayContacto =array('nombre' => $_POST['nombre'], 
    'email' => $_POST['email'], 
    'blog_id' => $_POST['blog_id'],
    'fecha' => $fecha,
    'mensaje' => $_POST['mensaje']);
    DB::graboComentario($arrayContacto);
    
    
}