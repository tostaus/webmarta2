<?php
  include ('../claseDB.php');
 
  if(isset($_POST['valor'])) {
      $valor = $_POST['valor'];
      $filtro= $_POST['filtro'];
      $leido= $_POST['leido'];
      DB::buscaCorreos($valor,$filtro,$leido);
      
  }
?>