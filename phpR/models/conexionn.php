<?php

class Conexion {

    public $con;

    public function __construct() {
        $this->con = mysqli_connect("localhost","root","","cuarto");
    }

    public function testConnection(){    
        if(!$this->con){
            die("Error".mysqli_connect_error());
        }else {
            print_r("Se conecto");
        }
    }
}

?>