<?php
$cedula = $_POST['cedula'];
$clave = $_POST['clave'];

require("./models/usuario.php");

$obj = new Usuario();
$respuesta = $obj->login($cedula, $clave);

$resul = array();
if ($respuesta) {

    if ($respuesta->num_rows > 0) {
        while ($fila = $respuesta->fetch_array()) {
            array_push($resul, $fila);
        }
    }

    if (!empty($resul)) {

        session_start();
        $_SESSION['id'] = $resul[0]['id'];
        $_SESSION['cedula'] = $resul[0]['cedula'];
        $_SESSION['nombre'] = $resul[0]['nombre'];
        $_SESSION['apellido'] = $resul[0]['apellido'];
        $_SESSION['rol'] = $resul[0]['id_rol'];
        $rol = $resul[0]['id_rol'];
        if ($rol == 1) {
            header('Location:view/admin.php');
        } elseif ($rol == 2) {
            header('Location:view/user.php');
        } else {
            echo $rol;
        }
    } else {
        echo "<script>alert('error de datos'); window.location.href='index.php'</script>";
    }
} else {
    echo "<script>alert('error de datos'); window.location.href='index.php'</script>";
}
