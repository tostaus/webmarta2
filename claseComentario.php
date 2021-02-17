<?php

// Clase que crea o devuelve objeto Contacto
class Comentario {
    
    protected $nombre;
    protected $email;
    protected $blog_id;
    protected $mensaje;
    protected $fecha;
   
    public function getnombre() {return $this->nombre;}
    public function getemail() {return $this->email;}
    public function getblog_id() {return $this->blog_id;}
    public function getmensaje() {return $this->mensaje;}
    public function getfecha() {return $this->fecha;}
    
    public function __construct($row)
    {
        $this->nombre = $row['nombre'];
        $this->email = $row['email'];
        $this->blog_id = $row['blog_id'];
        $this->mensaje = $row['mensaje'];
        $this->fecha = $row['fecha'];

        
        
        
    }
}

?> 