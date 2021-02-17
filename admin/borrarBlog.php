<?php
  include ('../claseDB.php');
 
  if(isset($_POST['cod'])) {
      $cod = $_POST['cod'];
      DB::borraBlog($cod);
  }
?>