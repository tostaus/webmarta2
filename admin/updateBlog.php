<?php

include ('../claseDB.php');
/*if(isset($_POST['titulo'])) {*/
// Comprobamos si el fichero tiene error
if (isset($_FILES['file']['name'])){
    //header('Location: cambiodefichero.php');
    $array = array('titulo' =>$_POST['titulo'],
    'id' =>$_POST['id'],
    'fecha' =>$_POST['fecha'],
    'hora' =>$_POST['hora'],
    'comentario'=>$_POST['comentario'],
    'imagen' =>$_FILES['file']['name'],);
    move_uploaded_file($_FILES["file"]["tmp_name"], "blog/imagenes/".$_FILES['file']['name']);
   
    
}else { // si todo ha ido bien
    //header('Location: sincambio.php');
    $array = array('titulo' =>$_POST['titulo'],
    'id' =>$_POST['id'],
    'fecha' =>$_POST['fecha'],
    'hora' =>$_POST['hora'],
    'comentario'=>$_POST['comentario'],
    'imagen'=>$_POST['file'],);
        
   
      
}

$responde=DB::updateBlog($array);
// Para que este funcione tiene que tener permiso  777 la carpeta imagenes
echo $responde;