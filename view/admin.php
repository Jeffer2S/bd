<?php
session_start();
$id = $_SESSION['id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pregunta1 = $_POST['pregunta1'];
    $pregunta2 = $_POST['pregunta2'];

    require('../models/encuesta.php');
    $obj = new Encuesta();
    $register = $obj->insertEncuesta($pregunta1, $pregunta2, $id);
    if ($register) {
        echo "<script>alert('guardado correctamente'); window.location.href='../view/admin.php'</script>";
    } else {
        echo "<script>alert('error..! intentalo nuevamente'); window.location.href='../view/admin.php'</script>";
    }
} else {
    require('../models/encuesta.php');
    $obj = new Encuesta();
    $existeEncuesta = $obj->existeEncuesta($id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>

<body>

    <button style="position: fixed; top:10px; right: 10px;"><a href="../models/logout.php"> Cerrar Sesion</a></button>

    <div>
        <h2>Administrador</h2>
        <h2>Nombre: <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?> </h2>
        <form method="post">
            <h2>1. Sabes Programacion Orientada a Objetos</h2>
            <input type="radio" name="pregunta1" id="" value="Si" required> SI
            <input type="radio" name="pregunta1" id="" value="No" required> NO <br>
            <h2>2. Sabes PHP</h2>
            <input type="radio" name="pregunta2" id="" value="Si" required> SI
            <input type="radio" name="pregunta2" id="" value="No" required> NO <br>
            <?php if (!$existeEncuesta) { ?>
                <button type="submit">Enviar</button>
                <button><a href="../models/logout.php">Cancelar</a></button>
            <?php } ?>
        </form>

        <button><a href="../view/reporte.php">Reportes</a></button>
        <button><a href="../view/users.php">Usuarios</a></button>
    </div>
</body>

</html>

















<!--
    <form method="post">
    <h2>1. Sabes Programacion Orientada a Objetos</h2>
    <input type="checkbox" name="pregunta1[]" id="pregunta1_si" value="Si"> SI
    <input type="checkbox" name="pregunta1[]" id="pregunta1_no" value="No"> NO <br>

    <h2>2. Sabes PHP</h2>
    <input type="checkbox" name="pregunta2[]" id="pregunta2_si" value="Si"> SI
    <input type="checkbox" name="pregunta2[]" id="pregunta2_no" value="No"> NO <br>

    <?php // if (!$existeEncuesta) { ?>
        <button type="submit">Enviar</button>
        <button><a href="../models/logout.php">Cancelar</a></button>
    <?php //} ?>
</form>

            -->

            <?php /*
session_start();
$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['pregunta1'])) {
        $pregunta1 = implode(', ', $_POST['pregunta1']);
    } else {
        $pregunta1 = '';
    }

    if (isset($_POST['pregunta2'])) {
        $pregunta2 = implode(', ', $_POST['pregunta2']);
    } else {
        $pregunta2 = '';
    }

    require('../models/encuesta.php');
    $obj = new Encuesta();
    $register = $obj->insertEncuesta($pregunta1, $pregunta2, $id);

    if ($register) {
        echo "<script>alert('guardado correctamente'); window.location.href='../view/admin.php'</script>";
    } else {
        echo "<script>alert('error..! intentalo nuevamente'); window.location.href='../view/admin.php'</script>";
    }
} else {
    require('../models/encuesta.php');
    $obj = new Encuesta();
    $existeEncuesta = $obj->existeEncuesta($id);
}*/
?>
