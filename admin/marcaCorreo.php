<?php
  include ('../claseDB.php');
 
  if(isset($_POST['cod'])) {
      $cod = $_POST['cod'];
      $leido = $_POST['leido'];
      DB::marcaCorreo($cod,$leido);
  }
?>