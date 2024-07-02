<?php
class Conexion
{
    public function conectar()
    {

        $servername = "localhost";
        $user = "root";
        $pass = "";
        $bd = "cuarto";

        $conn = mysqli_connect($servername, $user, $pass, $bd);

        if (!$conn) {
            die("Conexion fallida" . mysqli_connect_error());
        } else {
            //echo ("Conectasdo");
            return $conn;
        }
    }
}
