<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

    $varsesion = $_SESSION["id"];


//Apartado de la query
    require_once '../conexion/conexion.php';
        
            $consulta = "SELECT count(id_responsable) AS finalizadas FROM detalle WHERE estatus_id_estatus = 3 and id_responsable = $varsesion";
            $resultado = mysqli_query($mysqli, $consulta);
            $fila = mysqli_fetch_array($resultado);


            echo $fila["finalizadas"];
?>