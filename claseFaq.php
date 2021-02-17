<?php

// Clase que crea o devuelve objeto Contacto
class Faq {
    
    protected $pregunta;
    protected $respuesta;
   

   
    public function getpregunta() {return $this->pregunta;}
    public function getrespuesta() {return $this->respuesta;}

    
    public function __construct($row)
    {
        $this->pregunta = $row['pregunta'];
        $this->respuesta = $row['respuesta'];
       
        
        
        
    }
}

?> 