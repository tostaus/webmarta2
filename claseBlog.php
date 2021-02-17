<?php

// Clase que crea o devuelve objeto Contacto
class Blog {
    
    protected $titulo;
    protected $fecha;
    protected $hora;
    protected $comentario;
    protected $imagen;

   
    public function gettitulo() {return $this->titulo;}
    public function getfecha() {return $this->fecha;}
    public function gethora() {return $this->hora;}
    public function getcomentario() {return $this->comentario;}
    public function getimagen() {return $this->imagen;}

    
    public function __construct($row)
    {
        $this->titulo = $row['titulo'];
        $this->fecha = $row['fecha'];
        $this->hora = $row['hora'];
        $this->comentario = $row['comentario'];
        $this->imagen = $row['imagen'];

        
        
        
    }
}

?> 