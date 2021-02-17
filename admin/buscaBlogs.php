<?php
  include ('../claseDB.php');
 
  if(isset($_POST['valor'])) {
      $valor = $_POST['valor'];
      $filtro= $_POST['filtro'];
      ;
      DB::buscaBlogs($valor,$filtro);
      
  }
?>