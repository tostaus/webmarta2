<?php

include ('../claseDB.php');

if(isset($_POST['id'])) {
    // Hago un array conl os datos para el objeto Contacto
    $array =array('id' => $_POST['id'], 
    'contesta' => $_POST['contesta'],
    'fechacontesta' => $_POST['fechacontesta']);
    DB::enviarContesta($array);
    
    
}