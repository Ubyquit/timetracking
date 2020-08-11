<?php

    session_start();

    $varsesion = $_SESSION["id"];
    $rol_session = $_SESSION["rol"];

    require_once '../conexion/conexion.php';
    print_r($_POST);

    $tareas_id_tarea = $_POST['tarea'];
    $proyectos_id_proyecto = $_POST['proyecto_asignado'];

    
    $consulta ="INSERT INTO detalle(tareas_id_tarea, proyectos_id_proyecto, id_asignador, id_responsable, estatus_id_estatus) 
    VALUES ('$tareas_id_tarea', '$proyectos_id_proyecto', '$varsesion', '$varsesion', 1)";
    $resultado = mysqli_query($mysqli,$consulta);

    if($resultado == 1){
        $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
            VALUES ('INSERT', 'Se ha creado una asignación con la tarea $tareas_id_tarea', 'Tareas', now(), '$varsesion')";
            mysqli_query($mysqli, $consulta2);
        }

    header("Location: tareas_asignadas.php");

 ?>