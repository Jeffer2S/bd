<?php

require('../models/usuario.php');
$obj = new Usuario();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $clave = $_POST['clave'];
    $id_rol = $_POST['id_rol'];
    $obj->updateUsuario($id, $cedula, $nombre, $apellido, $clave, $id_rol);
    header('Location: ../view/users.php');
} else {

    $id = $_GET['id'];
    $user = $obj->getUsuarioBiId($id);
}
?>

<form action="editar.php" method="post">
    <input type="hidden" name="id" value="<?php echo $user[0]['id'] ?>">
    <label for="">Cedula</label> 
    <input type="text" name="cedula" value="<?php echo $user[0]['cedula'] ?>" readonly> <br>
    <label for="">Nombre</label>
    <input type="text" name="nombre" value="<?php echo $user[0]['nombre'] ?>"> <br>
    <label for="">Apellido</label>
    <input type="text" name="apellido" value="<?php echo $user[0]['apellido'] ?>"> <br>
    <label for="">Clave</label>
    <input type="text" name="clave" value="<?php echo $user[0]['clave'] ?>"> <br>
    <label for="">Rol</label>
    <input type="text" name="id_rol" value="<?php echo $user[0]['id_rol'] ?>"> <br>
    <button type="submit">Actualizar</button>
</form>

<button style="position: fixed; top:10px; right: 10px;"><a href="./admin.php">Cancelar</a></button>