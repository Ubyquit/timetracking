<?php

    session_start();

    $varsesion = $_SESSION["id"];
    $rol_session = $_SESSION["rol"];

    require_once '../conexion/conexion.php';

    $id_detalle = $_GET['id'];


    
    $consulta ="UPDATE detalle SET fecha_fin = now(), estatus_id_estatus = 3 WHERE id_detalle = '$id_detalle'";
    mysqli_query($mysqli,$consulta);    

    header("Location: tareas_asignadas.php");

 ?>