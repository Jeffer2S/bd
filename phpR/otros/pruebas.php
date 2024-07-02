<?php


$auto1=(object)["marca"=>"toyota","modelo"=>"x30","color"=>"rojo"];
$auto2=(object)["marca"=>"ford","modelo"=>"x30","color"=>"rojo"];

function Automovil($auto){
    echo($auto->marca);
}

echo(Automovil($auto2));