<?php
include ('claseDB.php');
$usuario=""; // Aquí ponemos el nombre de usuario entre las comillas
$password=""; // Aqui ponemos contraseña

  
  DB::graboUsuario($usuario,$password);

?>