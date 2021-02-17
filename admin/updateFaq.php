<?php

include ('../claseDB.php');

if(isset($_POST['cod'])) {
    // Hago un array conl os datos para el objeto Contacto
    $array =array('pregunta' => $_POST['pregunta'], 
    'cod' => $_POST['cod'],
    'respuesta' => $_POST['respuesta']);
    DB::updateFaq($array);
    
    
}