<?php
class Usuario
{
    private $con;

    public function __construct()
    {
        include('conexion.php');
        $obj = new Conexion();
        $this->con = $obj->conectar();
        
    }

    public function cerrarConexion(){
        $this->con->close();
    }

    public function login($cedula, $clave)
    {
        $sql = "SELECT * FROM usuarios WHERE cedula='$cedula' AND clave = '$clave'";
        $respuesta = $this->con->query($sql);
        if ($respuesta) {
            return $respuesta;
        } else {
            return false;
        }
    }

    public function register($cedula, $nombre, $apellido, $clave, $rol)
    {
        try {
            $sql = "INSERT INTO usuarios (cedula,nombre,apellido,clave,id_rol) VALUES ('$cedula','$nombre','$apellido','$clave','$rol')";
            $respuesta = $this->con->query($sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getUsuarios()
    {
        try {
            $sql = "SELECT * FROM usuarios";
            $respuesta = $this->con->query($sql);
            $resul = array();
            if ($respuesta) {
                if ($respuesta->num_rows > 0) {
                    while ($fila = $respuesta->fetch_array()) {
                        array_push($resul, $fila);
                    }
                }
                if (!empty($resul)) {
                    return $resul;
                } else {
                    return false;
                }
            }
        } catch (Exception $e) {
            echo "<script>alert('Error a obtenert datos')</script>";
            return false;
        }
    }
    public function getUsuarioBiId($id)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE id = '$id'";
            $respuesta = $this->con->query($sql);
            $resul = array();
            if ($respuesta) {
                if ($respuesta->num_rows > 0) {
                    while ($fila = $respuesta->fetch_array()) {
                        array_push($resul, $fila);
                    }
                }
                if (!empty($resul)) {
                    return $resul;
                } else {
                    return false;
                }
            }
        } catch (Exception $e) {
            echo "<script>alert('Error al obtenert datos')</script>";
            return false;
        }
    }

    public function updateUsuario($id,$cedula,$nombre,$apellido,$clave,$id_rol){
        try{
            $sql = "UPDATE usuarios SET 
                cedula = '$cedula', 
                nombre = '$nombre', 
                apellido = '$apellido', 
                clave = '$clave', 
                id_rol = '$id_rol' 
                WHERE id = '$id'";
                $this->con->query($sql);
        }catch(Exception $e){
            echo "<script>alert('Error al actualizar')</script>";
        }
    }
    
    public function deleteUsuario($id){
        try{
            $sql = "DELETE FROM usuarios 
                WHERE id = '$id'";
                $this->con->query($sql);
        }catch(Exception $e){
            echo "<script>alert('Error al eliminar')</script>";
        }
    }
    public function __destruct()
    {
        $this->cerrarConexion();
    }
}
