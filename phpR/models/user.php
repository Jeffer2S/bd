<?php

include 'conexionn.php';

function getStudent($cedula) {
    // Crear la consulta SQL con un parámetro para la cédula
    $sqlSelect = "SELECT 
        e.ced_est,
        e.nom_est, 
        e.ape_est,
        e.tel_est,
        e.dir_est,
        c.nom_cur
    FROM estudiantes e
    JOIN cursos c ON e.id_cur = c.id_cur
    WHERE e.ced_est = ?";
    
    // Crear la conexión
    $connect = new Conexion();
    
    // Preparar la consulta para evitar inyecciones SQL
    if ($stmt = $connect->con->prepare($sqlSelect)) {
        // Vincular el parámetro de la cédula
        $stmt->bind_param("s", $cedula);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener los resultados
        $result = $stmt->get_result();
        $resultado = array();
        
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $resultado = $fila;
            }
        } else {
            return json_encode(array("message" => "No hay resultados"));
        }
        
        // Cerrar la declaración
        $stmt->close();
    } else {
        return json_encode(array("message" => "Error en la preparación de la consulta: " . $connect->con->error));
    }
    
    // Cerrar la conexión
    $connect->con->close();
    
    // Devolver el resultado en formato JSON
    return json_encode($resultado);
}

// Obtener la cédula desde el parámetro GET
if (isset($_GET['ced_est'])) {
    $cedula = $_GET['ced_est'];
    echo getStudent($cedula);
} else {
    echo json_encode(array("message" => "No se proporcionó la cédula"));
}

?>