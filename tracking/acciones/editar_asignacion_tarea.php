<?php

    session_start();

    $varsesion = $_SESSION["id"];
    $rol_session = $_SESSION["rol"];

    require_once '../../conexion/conexion.php';
    print_r($_POST);

    $id_detalle = $_POST['id_detalle'];
    $tareas_id_tarea = $_POST['tarea'];
    $proyectos_id_proyecto = $_POST['proyecto_asignado'];
    $id_responsable = $_POST['usuario_responsable'];

    
    $consulta = "UPDATE detalle SET tareas_id_tarea = '$tareas_id_tarea', proyectos_id_proyecto = '$proyectos_id_proyecto',
    id_responsable = '$id_responsable' where id_detalle = $id_detalle";

    //$consulta ="INSERT INTO detalle(tareas_id_tarea, proyectos_id_proyecto, id_asignador, id_responsable, estatus_id_estatus) 
   // VALUES ('$tareas_id_tarea', '$proyectos_id_proyecto', '$varsesion', '$id_responsable', 1)";
    mysqli_query($mysqli,$consulta);

    header("Location: ../tareas_asignadas.php");

 ?>