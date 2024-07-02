<?php

class Auto{
    public $marca;
    public $modelo;
    public $color;

    public function __construct ($marca,$modelo,$color) {
        $this->marca=$marca;
        $this->modelo=$modelo;
        $this->color=$color;
    }
    function mostrar(){
        echo($this->marca." ".$this->modelo." ".$this->color);
    }

     static function mensaje(){
        echo("Hola");
    }

}

$auto1 = new Auto("Toyota","sz","Azul");
//$auto1->marca = "Chebrolet";
//$auto1->modelo = "aveo";
//$auto1->color = "rojo";
//

$auto1->mostrar();
echo("<br>");
Auto::mensaje();