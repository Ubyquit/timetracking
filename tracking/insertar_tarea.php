<?php

    session_start();

    $varsesion = $_SESSION["id"];
    $rol_session = $_SESSION["rol"];

    require_once '../conexion/conexion.php';
    print_r($_POST);

    $nombre_tarea = $_POST['tarea'];
    
    $consulta_tarea ="INSERT INTO tareas (nombre_tarea,fecha_creacion,usuarios_id_usuario)
    VALUES ('$nombre_tarea',now(),'$varsesion')";
    mysqli_query($mysqli,$consulta_tarea);
    header("Location: tareas.php");

 ?>