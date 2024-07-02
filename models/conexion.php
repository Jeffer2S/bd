<?php

class Conexion{

    public function conectar(){
        $con = mysqli_connect("localhost","root","","encuesta");

        if(!$con){
            die("Error de conexion". mysqli_connect_error());
        }
        //echo "conectado";
        return $con;
    }

}

//$obj = new Conexion();
//$con = $obj->conectar();





















/*
SELECT partes.*
FROM partes
INNER JOIN objetos ON partes.id_objeto = objetos.id
WHERE objetos.nombre = 'telefono';

SELECT COUNT(*) as total, respuesta1 FROM respuestas GROUP BY respuesta1
SELECT COUNT(*) as total, respuesta2 FROM respuestas GROUP BY respuesta2

-- Consulta principal para obtener los nombres de los clientes y sus ciudades
SELECT clientes.nombre AS nombre_cliente, clientes.apellido, ciudades.nombre AS nombre_ciudad
FROM clientes
INNER JOIN ciudades ON clientes.ciudad_id = ciudades.id

-- Consulta para obtener el total de Pago_servicio de todos los clientes
SELECT SUM(Pago_servicio) AS total_pagos
FROM clientes;

--Para obtener el total de Pago_servicio de los clientes que viven en Madrid,
SELECT SUM(clientes.Pago_servicio) AS total_pagos
FROM clientes
INNER JOIN ciudades ON clientes.ciudad_id = ciudades.id
WHERE ciudades.nombre = 'Madrid';

-- Para obtener la suma de Pago_servicio agrupada por cada ciudad, puedes utilizar la cláusula GROUP BY. Aquí tienes cómo hacerlo:
SELECT ciudades.nombre AS nombre_ciudad, SUM(clientes.Pago_servicio) AS total_pagos
FROM clientes
INNER JOIN ciudades ON clientes.ciudad_id = ciudades.id
GROUP BY ciudades.nombre;

-- Contar el número de clientes:
SELECT COUNT(*) AS total_clientes
FROM clientes;

-- Contar el número de pedidos realizados por cada cliente:
SELECT clientes.nombre, COUNT(pedidos.id) AS total_pedidos
FROM clientes
INNER JOIN pedidos ON clientes.id = pedidos.cliente_id
GROUP BY clientes.nombre;

-- Contar el número de productos en cada categoría:
SELECT categorias.nombre AS categoria, COUNT(productos.id) AS total_productos
FROM categorias
INNER JOIN productos ON categorias.id = productos.categoria_id
GROUP BY categorias.nombre;

-- Contar el número de pedidos que contienen un producto específico (por ejemplo, 'Laptop'):
SELECT productos.nombre, COUNT(detalle_pedidos.pedido_id) AS total_pedidos
FROM productos
INNER JOIN detalle_pedidos ON productos.id = detalle_pedidos.producto_id
WHERE productos.nombre = 'Laptop'
GROUP BY productos.nombre;

----------
$sqlSelect = " 
        SELECT 
        u.nombre, 
        u.apellido, 
        t.id_transac, 
        t.tipo, 
        t.monto 
    FROM 
        users u,
        transacciones t 
    WHERE 
        u.id_user = $id and t.id_user=$id";

*/

?>