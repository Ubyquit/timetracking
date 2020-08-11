<?php

    session_start();

    $varsesion = $_SESSION["id"];
    $rol_session = $_SESSION["rol"];

    require_once '../conexion/conexion.php';
    print_r($_POST);

    $nombre_tarea = $_POST['tarea'];
    
    $consulta_tarea ="INSERT INTO tareas (nombre_tarea,fecha_creacion,usuarios_id_usuario)
    VALUES ('$nombre_tarea',now(),'$varsesion')";
    $resultado = mysqli_query($mysqli,$consulta_tarea);

    if($resultado == 1){
        $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
            VALUES ('INSERT', 'Se ha creado la tarea $nombre_tarea', 'Tareas', now(), '$varsesion')";
            mysqli_query($mysqli, $consulta2);
        }


    header("Location: tareas.php");

 ?>