<?php

    session_start();

    $varsesion = $_SESSION["id"];
    $rol_session = $_SESSION["rol"];

    require_once '../conexion/conexion.php';

    $id_detalle = $_GET['id'];


    
    $consulta ="UPDATE detalle SET fecha_fin = now(), estatus_id_estatus = 3 WHERE id_detalle = '$id_detalle'";
    $resultado = mysqli_query($mysqli,$consulta);    

    if($resultado == 1){
        $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
            VALUES ('UPDATE', 'El usuario $varsesion a finalizado la tarea $id_detalle', 'Tareas', now(), '$varsesion')";
            mysqli_query($mysqli, $consulta2);
        }

    header("Location: tareas_asignadas.php");

 ?>