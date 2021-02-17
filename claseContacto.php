<?php

// Clase que crea o devuelve objeto Contacto
class Contacto {
    
    protected $nombre;
    protected $email;
    protected $asunto;
    protected $mensaje;
   
    public function getnombre() {return $this->nombre;}
    public function getemail() {return $this->email;}
    public function getasunto() {return $this->asunto;}
    public function getmensaje() {return $this->mensaje;}
    
    public function __construct($row)
    {
        $this->nombre = $row['nombre'];
        $this->email = $row['email'];
        $this->asunto = $row['asunto'];
        $this->mensaje = $row['mensaje'];
        
        
        
    }
}

?> 