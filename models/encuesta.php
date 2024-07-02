<?php 
class Encuesta{
    public function insertEncuesta($respuesta1, $respuesta2, $id){
        try {
            include('conexion.php');
            $obj = new Conexion();
            $con = $obj->conectar();
            $sql = "INSERT INTO respuestas (respuesta1,respuesta2,id_usuario) VALUES ('$respuesta1','$respuesta2','$id')";
            $respuesta = $con->query($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function existeEncuesta($id){
        try {
            include('conexion.php');
            $obj = new Conexion();
            $con = $obj->conectar();
            $sql = "SELECT * FROM respuestas WHERE id_usuario = '$id'";
            $respuesta = $con->query($sql);

            if($respuesta->num_rows>0){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            echo "<script>alert('error de reporte');</script>";;
        }
    }
}

?>