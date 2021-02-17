<?php
  include ('../claseDB.php');
  
  if(isset($_POST['leido'])) {
    $leido = $_POST['leido'];
    DB::listaCorreos($leido);
}
?>