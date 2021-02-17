<?php

include ('../claseDB.php');

if(isset($_POST['usuario'])) {
    // Hago un array conl os datos para el objeto Contacto
    $usuario = $_POST['usuario'];
    
    $password= $_POST['password'];

    

    DB::cambiaPass($usuario,$password);
    
    
}