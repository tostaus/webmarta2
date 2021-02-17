<?php

include ('../claseDB.php');
/*if(isset($_POST['titulo'])) {*/
// Comprobamos si el fichero tiene error
if ($_FILES['file']['error']!=0){
    echo 2;
    
}else { // si todo ha ido bien

    $array = array('titulo' =>$_POST['titulo'],
    'fecha' =>$_POST['fecha'],
    'hora' =>$_POST['hora'],
    'comentario'=>$_POST['comentario'],
    'imagen' =>$_FILES['file']['name'],);
        
    $responde=DB::addBlog($array);
    // Para que este funcione tiene que tener permiso  777 la carpeta imagenes
    move_uploaded_file($_FILES["file"]["tmp_name"], "blog/imagenes/".$_FILES['file']['name']);
    echo $responde;
      
}