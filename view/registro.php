<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];
    require ('../models/usuario.php');
    $obj = new Usuario();
    $register = $obj->register($cedula,$nombre,$apellido,$clave,$rol);
    if($register){
        echo "<script>alert('registrado correctamente'); window.location.href='../index.php'</script>";
    }else{
        echo "<script>alert('error..! intentalo nuevamente'); window.location.href='./registro.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form method="post">
        <div>
            <label for="">Cedula</label>
            <input type="text" name="cedula">
        </div>
        <div>
            <label for="">Nombre</label>
            <input type="text" name="nombre">
        </div>
        <div>
            <label for="">Apellido</label>
            <input type="text" name="apellido">
        </div>
        <div>
            <label for="">Clave</label>
            <input type="text" name="clave">
        </div>
        <div>
            <label for="">Rol</label>
            <select name="rol" id="rol">
                <option value="">Seleccionar</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>
        </div>
        <button type="submit">Registrar</button>
        <button><a href="../index.php">Inicio</a></button>
    </form>
</body>
</html>