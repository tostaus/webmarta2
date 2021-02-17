<?php

include ('../claseDB.php');

if(isset($_POST['pregunta'])) {
    // Hago un array conl os datos para el objeto Contacto
    $array =array('pregunta' => $_POST['pregunta'], 
    
    'respuesta' => $_POST['respuesta']);
    DB::graboFaq($array);
    
    
}