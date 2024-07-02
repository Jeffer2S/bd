
<?php 
require('../models/usuario.php');
$obj = new Usuario();
$usuarios = $obj->getUsuarios();
?>

<h2>CRUD USUARIOS</h2>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Clave</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($usuarios as $usuario) { ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['cedula']; ?></td>
                <td><?php echo $usuario['nombre']; ?></td>
                <td><?php echo $usuario['apellido']; ?></td>
                <td><?php echo $usuario['clave']; ?></td>
                <td><?php echo $usuario['id_rol']; ?></td>
                <td><a href="./editar.php?id=<?php echo $usuario['id']; ?>">Editar</a></td>
                <td><a href="./eliminar.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('Esta seguro de eliminar?')">Eliminar</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<buttons style="position: fixed; top:10px; right: 10px;"><a href="./admin.php">Atras</a></button>