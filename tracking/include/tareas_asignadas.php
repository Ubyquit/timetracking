<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

    $varsesion = $_SESSION["id"];


//Apartado de la query
    require_once '../conexion/conexion.php';
        
            $consulta = "SELECT COUNT(id_asignador) AS tareas_asignadas FROM detalle 
            WHERE id_asignador = $varsesion";
            $resultado = mysqli_query($mysqli, $consulta);
            $fila = mysqli_fetch_array($resultado);
            echo $fila["tareas_asignadas"];
?>