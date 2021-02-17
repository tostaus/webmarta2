<?php
require_once('claseContacto.php');
require_once('claseBlog.php');
require_once('claseComentario.php');
require_once('claseFaq.php');




class DB {
    // Conexión a la BBDD
    protected static function conectar(){
        $db_host = 'localhost';  //  hostname 
        $db_name = 'psico';  //  databasename
        $db_user = 'prueba';  //  username
        $user_pw = 'prueba';  //  password
        try {
            $conexion = new PDO('mysql:host='.$db_host.'; dbname='.$db_name, $db_user, $user_pw);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("set names utf8");
        } catch (PDOException $e) { //Se capturan los mensajes de error
            die("Error: " . $e->getMessage()); 
        }
        return $conexion;

    }
    // Grabar Registro en tabla contacto
    public static function graboContacto($row){
        $conecta=self::conectar();
        //Creo Objeto contacto
        $contactoNuevo= new Contacto($row);
        //Metemos cada atributo del nuevo objeto movimiento en variables para hacer la consulta más limpia.
        $nombre = $contactoNuevo -> getnombre();
        $email = $contactoNuevo -> getemail();
        $asunto =$contactoNuevo -> getasunto();
        $mensaje =$contactoNuevo -> getmensaje();
      
        //Preparo consulta
        $consulta= "INSERT INTO contacto (nombre, email ,asunto, mensaje)
        VALUES ('$nombre', '$email', '$asunto' , '$mensaje')";
        $resultado =$conecta->prepare($consulta);
        // Intentamos la consulta
        try{
            $resultado ->execute();
            
            
        }catch (Exception $e){ // Capturamos el error si se produce
            $mensaje = $e->getMessage();
                die("No se ha podido insertar el contacto " . $e->getMessage());
                 
        }
        
    }
    // Función que devuelve los Contactos
    public static function listaCorreos($leido){
        $conecta=self::conectar();
        $consulta = "SELECT * FROM contacto WHERE leido = $leido ORDER BY fecha DESC";
        $resultado = $conecta->prepare($consulta);
        try{
            $resultado ->execute();
            $registros = $resultado->fetchAll();
            $jsonstring = json_encode($registros);
            echo $jsonstring;
        }catch (Exception $e){ // Capturamos el error si se produce
            $mensaje = $e->getMessage();
                die("No se ha podido encontrar Correos: " . $e->getMessage()); 
        }
       
    }

     // Función para devolver un Contacto

     public static function devuelveCorreo($cod){
        $conecta=self::conectar();
        $consulta ="SELECT * FROM contacto WHERE id='$cod'";
        $resultado = $conecta->prepare($consulta);
        // Intentamos la consulta
        try{
            $resultado ->execute();
            $registros = $resultado->fetch();
            $jsonstring = json_encode($registros);
            echo $jsonstring;
        }catch (Exception $e){ // Capturamos el error si se produce
            $mensaje = $e->getMessage();
                die("No se ha podido devolver el Correo: " . $e->getMessage()); 
        }
       
    }

    // narca correo como leido
    public static function marcaCorreo($cod,$leido){
        $conecta=self::conectar();
        
        
        $consulta= "UPDATE contacto SET leido = $leido WHERE id ='$cod'";
        $resultado = $conecta->prepare($consulta);
        // Intentamos la consulta
        try{
            $resultado ->execute();
            echo 1;
        }catch (Exception $e){ // Capturamos el error si se produce
            $mensaje = $e->getMessage();
                die("No se ha podido modificar correo: " . $e->getMessage()); 
            echo 0;
        }



}
public static function borraCorreo($cod){
    $conecta=self::conectar();
    
    
    $consulta= "DELETE FROM contacto WHERE id ='$cod'";
    $resultado = $conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        echo 1;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido borrar Correo: " . $e->getMessage()); 
        echo 0;
    }



}
  // Función que devuelve los Usuarios de la BUSQUEDA
  public static function buscaCorreos($valor,$filtro,$leido){
    $conecta=self::conectar();
    // Creamos variable para el LIKE con %
    $busca='%' .$valor . '%';
    $consulta = "SELECT * FROM contacto WHERE $filtro LIKE '$busca' and leido = $leido ORDER BY fecha DESC";
    $resultado = $conecta->prepare($consulta);
    try{
        $resultado ->execute();
        $registros = $resultado->fetchAll();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido encontrar Artículos: " . $e->getMessage()); 
    }
}

public static function compruebaUsuario($user,$clave){
    $conecta=self::conectar();
    $consulta = "SELECT * FROM users WHERE user='$user'";
    $resultado = $conecta->prepare($consulta);
    try{
        $resultado ->execute();
        $fila = $resultado->fetch();
        //$comprueba = password_verify($password,$fila['password']);
        $comprueba = password_verify($clave,$fila['password']);
        
        return $comprueba;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("Error en BBDD: " . $e->getMessage()); 
    }

    
}

public static function graboUsuario ($usuario,$password){
    //$password='prueba';
    //$usuario='prueba';
    $password_e=password_hash($password,PASSWORD_DEFAULT); //encriptamos password
    
    $daw=self::conectar();
    //controlamos el error en caso de clave duplicada por ejemplo
    try{
        $consulta = $daw->prepare( "INSERT INTO users (user, password)
        VALUES (:usuario, :password_e)");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->bindParam(':password_e', $password_e);
       
        $consulta->execute();
        $error_envio ="!!Registro Grabado!!"; //La grabacion se realizo
        }
    catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
            $daw=false;
            if ($error ==23000){ // En el caso de que de error de clave duplicada
                $error_envio= " ¡¡Ya existe un usuario con ese login!!"; 
            }else {
                $error_envio =  $mensaje ; // en caso de que sea otro error
            }
           
     }
     echo $error_envio;
}

public static function addBlog ($row){
    
    $conecta=self::conectar();
    //Creo Objeto contacto
    $blogNuevo= new Blog($row);
    //Metemos cada atributo del nuevo objeto movimiento en variables para hacer la consulta más limpia.
    $titulo = $blogNuevo -> gettitulo();
    $fecha = $blogNuevo -> getfecha();
    $hora =$blogNuevo -> gethora() ;
    $comentario =$blogNuevo -> getcomentario();
    $imagen =$blogNuevo -> getimagen();


    //Preparo consulta
    $consulta= "INSERT INTO blogs (titulo, fecha ,hora, comentario,imagen)
    VALUES ('$titulo', '$fecha', '$hora' , '$comentario','$imagen')";
    $resultado =$conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        $devuelve=0;
        
    }catch (Exception $e){ // Capturamos el error si se produce
        $devuelve=1;
            
    }
    echo $devuelve;
}

// Función que devuelve los Comentarios del Blog
public static function listaBlog(){
    $conecta=self::conectar();
    $consulta = "SELECT * FROM blogs ORDER BY fecha DESC , hora DESC";
    $resultado = $conecta->prepare($consulta);
    try{
        $resultado ->execute();
        $registros = $resultado->fetchAll();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido encontrar Entradas: " . $e->getMessage()); 
    }
   
}

  // Función para devolver un Contacto

  public static function devuelveBlog($cod){
    $conecta=self::conectar();
    $consulta ="SELECT * FROM blogs WHERE id='$cod'";
    $resultado = $conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        $registros = $resultado->fetch();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido devolver el Blog: " . $e->getMessage()); 
    }
   
}

// Función para Borrar entrada de Blog
public static function borraBlog($cod){
    $conecta=self::conectar();
    
    
    $consulta= "DELETE FROM blogs WHERE id ='$cod'";
    $resultado = $conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        echo 1;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido borrar Entrada: " . $e->getMessage()); 
        echo 0;
    }



}

// Función para Modificar una entrada del Blog
public static function updateBlog($row){
   
    $conecta=self::conectar();
    $id=$row['id'];
    $titulo=$row['titulo'];
    $fecha=$row['fecha'];
    $hora=$row['hora'];
    $comentario=$row['comentario'];
    $imagen=$row['imagen'];
   
   $consulta= "UPDATE blogs SET titulo = '$titulo', fecha='$fecha', hora='$hora', comentario='$comentario', imagen='$imagen' WHERE id ='$id'";
    $resultado = $conecta->prepare($consulta);
    try{
        $resultado ->execute();
        echo 0;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido borrar Entrada: " . $e->getMessage()); 
        echo 1;
    }
    

}
// Función que devuelve los Usuarios de la BUSQUEDA
public static function buscaBlogs($valor,$filtro){
    $conecta=self::conectar();
    // Creamos variable para el LIKE con %
    $busca='%' .$valor . '%';
    $consulta = "SELECT * FROM blogs WHERE $filtro LIKE '$busca' ORDER BY fecha DESC";
    $resultado = $conecta->prepare($consulta);
    try{
        $resultado ->execute();
        $registros = $resultado->fetchAll();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido encontrar Artículos: " . $e->getMessage()); 
    }
}

// Lista para portada de blog
public static function listaPortadaBlog(){
    $conecta=self::conectar();
    $consulta = "SELECT * FROM blogs ORDER BY fecha DESC , hora DESC";
    $resultado = $conecta->prepare($consulta);
    try{
        $resultado ->execute();
        $registros = $resultado->fetchAll();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido encontrar Entradas: " . $e->getMessage()); 
    }

}

public static function devuelveDetalleBlog($cod){
    $conecta=self::conectar();
    /**
     * CAMBIAR EL PUBLICADO A 0 CUANDO CONTROLEMOS EL TEMA DE PUBLICADOS
     * 
     */
    $consulta ="SELECT * FROM comentarios WHERE Blogs_id='$cod' and publicado=0 ORDER BY fecha ASC , id ASC";
    $resultado = $conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        $registros = $resultado->fetchAll();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido devolver el Blog: " . $e->getMessage()); 
    }
   
}

public static function graboComentario($row){
    $conecta=self::conectar();
    //Creo Objeto contacto
    
    $comentarioNuevo= new Comentario($row);
    //Metemos cada atributo del nuevo objeto movimiento en variables para hacer la consulta más limpia.
    $nombre = $comentarioNuevo -> getnombre();
    $email = $comentarioNuevo -> getemail();
    $blog_id =$comentarioNuevo -> getblog_id();
    $mensaje =$comentarioNuevo -> getmensaje();
    $fecha =$comentarioNuevo -> getfecha();

    // Ponemos foto si ha comentado uno o otro
    if ($nombre =="Marta Rubio"){
        $imagen="fotomarta.jpg";
        $publicado=0;
    }else{
        $imagen="anonimo.jpeg";
        $publicado=1;
    }
  
    //Preparo consulta
    $consulta= "INSERT INTO comentarios (nombre, email ,blogs_id, mensaje, fecha, foto,publicado)
    VALUES ('$nombre', '$email', '$blog_id' , '$mensaje', '$fecha', '$imagen', '$publicado')";
    $resultado =$conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        
        
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido insertar el contacto " . $e->getMessage());
             
    }
    
}

public static function devuelveComentario($cod){
    $conecta=self::conectar();
    $consulta ="SELECT * FROM comentarios WHERE blogs_id='$cod' and publicado=0";
    $resultado = $conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        $registros = $resultado->fetchAll();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido devolver Comenetarios: " . $e->getMessage()); 
    }
   
}

public static function borraComentario($cod){
    $conecta=self::conectar();
    
    
    $consulta= "DELETE FROM comentarios WHERE id ='$cod'";
    $resultado = $conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        echo 1;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido borrar Entrada: " . $e->getMessage()); 
        echo 0;
    }



}
public static function listaComentarioPen(){
    $conecta=self::conectar();
    $consulta = "SELECT C.id, C.nombre, C.email, C.mensaje, C.fecha, C.publicado,
    C.blogs_id , B.titulo FROM comentarios C , blogs B WHERE publicado = 1 and C.blogs_id = B.id ORDER BY fecha DESC";
    $resultado = $conecta->prepare($consulta);
    try{
        $resultado ->execute();
        $registros = $resultado->fetchAll();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido encontrar Correos: " . $e->getMessage()); 
    }
   
}
  // Función para devolver un Contacto

  public static function devuelveComentarioPen($cod){
    $conecta=self::conectar();
    $consulta ="SELECT * FROM comentarios WHERE id='$cod'";
    $resultado = $conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        $registros = $resultado->fetch();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido devolver el Blog: " . $e->getMessage()); 
    }
   
}

public static function publicaComentarioPen($cod){
    $conecta=self::conectar();
    $consulta ="UPDATE comentarios SET publicado = 0 WHERE id ='$cod'";
    $resultado = $conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        $registros = $resultado->fetch();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido devolver el Blog: " . $e->getMessage()); 
    }
   
}

// Lista para portada de blog
public static function listaFaq(){
    $conecta=self::conectar();
    $consulta = "SELECT * FROM faq ";
    $resultado = $conecta->prepare($consulta);
    try{
        $resultado ->execute();
        $registros = $resultado->fetchAll();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido encontrar Entradas: " . $e->getMessage()); 
    }

}

public static function devuelveFaq($cod){
    $conecta=self::conectar();
    $consulta ="SELECT * FROM faq WHERE id='$cod'";
    $resultado = $conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        $registros = $resultado->fetch();
        $jsonstring = json_encode($registros);
        echo $jsonstring;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido devolver el Blog: " . $e->getMessage()); 
    }
   
}

public static function graboFaq($row){
    $conecta=self::conectar();
    //Creo Objeto contacto
    
    $faqNuevo= new Faq($row);
    //Metemos cada atributo del nuevo objeto movimiento en variables para hacer la consulta más limpia.
    $pregunta = $faqNuevo -> getpregunta();
    $respuesta = $faqNuevo -> getrespuesta();
   

    
  
    //Preparo consulta
    $consulta= "INSERT INTO faq (pregunta, respuesta) VALUES ('$pregunta', '$respuesta')";
    
    $resultado =$conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        
        
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido insertar el pregunta " . $e->getMessage());
             
    }
    
}
public static function updateFaq($row){
   
    $conecta=self::conectar();
    $id=$row['cod'];
    $pregunta=$row['pregunta'];
    $respuesta=$row['respuesta'];
    
   
   $consulta= "UPDATE faq SET pregunta = '$pregunta', respuesta='$respuesta' WHERE id ='$id'";
    $resultado = $conecta->prepare($consulta);
    try{
        $resultado ->execute();
        echo 0;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido borrar Entrada: " . $e->getMessage()); 
        echo 1;
    }
    

}

public static function borrarFaq($cod){
    $conecta=self::conectar();
    
    
    $consulta= "DELETE FROM faq WHERE id ='$cod'";
    $resultado = $conecta->prepare($consulta);
    // Intentamos la consulta
    try{
        $resultado ->execute();
        echo 1;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido borrar Entrada: " . $e->getMessage()); 
        echo 0;
    }



}

public static function compruebaPass($user,$clave){
    $conecta=self::conectar();
    $consulta = "SELECT * FROM users WHERE user='$user'";
    $resultado = $conecta->prepare($consulta);
    try{
        $resultado ->execute();
        $fila = $resultado->fetch();
        //$comprueba = password_verify($password,$fila['password']);
        //$comprueba = password_verify($clave,$fila['password']);
        if(password_verify($clave,$fila['password'])){
            $comprueba=1;
        }else{
            $comprueba=0;
        }
        
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("Error en BBDD: " . $e->getMessage()); 
    }

   echo $comprueba; 
}

public static function cambiaPass($user,$clave){
   
    $conecta=self::conectar();
    $password_e=password_hash($clave,PASSWORD_DEFAULT);
    
   
   $consulta= "UPDATE users SET password = '$password_e' WHERE user ='$user'";
    $resultado = $conecta->prepare($consulta);
    try{
        $resultado ->execute();
        echo 0;
    }catch (Exception $e){ // Capturamos el error si se produce
        $mensaje = $e->getMessage();
            die("No se ha podido borrar Entrada: " . $e->getMessage()); 
        echo 1;
    }
    

}
}
