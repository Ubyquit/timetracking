<?php

    session_start();

    $varsesion = $_SESSION["id"];
    $rol_session = $_SESSION["rol"];

    require_once '../conexion/conexion.php';
    print_r($_POST);

    $tareas_id_tarea = $_POST['tarea'];
    $proyectos_id_proyecto = $_POST['proyecto_asignado'];
    $id_responsable = $_POST['usuario_responsable'];

    
    $consulta ="INSERT INTO detalle(tareas_id_tarea, proyectos_id_proyecto, id_asignador, id_responsable, estatus_id_estatus) 
    VALUES ('$tareas_id_tarea', '$proyectos_id_proyecto', '$varsesion', '$id_responsable', 1)";
    $resultado = mysqli_query($mysqli,$consulta);

    if($resultado == 1){
        session_start();
        $varsesion = $_SESSION["id"];
        $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
            VALUES ('INSERT', 'Se han creado la asignación al usuario $id_responsable', 'Tareas', now(), '$varsesion')";
            mysqli_query($mysqli, $consulta2);
        }

    header("Location: tareas_asignadas.php");

 ?>