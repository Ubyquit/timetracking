<?php

session_start();

    $varsesion = $_SESSION["id"];


//Apartado de la query
    require_once '../conexion/conexion.php';
        
            $consulta = "SELECT COUNT(id_responsable) AS mis_tareas FROM detalle WHERE id_responsable = $varsesion";
            $resultado = mysqli_query($mysqli, $consulta);
            $fila = mysqli_fetch_array($resultado);


            echo $fila["mis_tareas"];
?>