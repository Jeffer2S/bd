<?php

require('../models/usuario.php');
$obj = new Usuario();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $obj->deleteUsuario($id);
    header('Location: ../view/users.php');
}else{
    header('Location: ../view/users.php');
}