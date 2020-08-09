<?php
    session_start();
    $varsesion = $_SESSION["id"];
    if($varsesion == null || $varsesion = ''){
        echo 'Usted no tiene acceso';
        die();
        }
        
    //Apartado de la query
    require_once '../../conexion/conexion.php';
    $id = $_GET['id'];

        
            $consulta = "DELETE FROM detalle WHERE id_detalle = '$id'";
            $resultado = mysqli_query($mysqli, $consulta);

    header("Location: ../tareas_asignadas.php");
 ?>