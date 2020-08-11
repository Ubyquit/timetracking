<?php

    session_start();
    $varsesion = $_SESSION["id"];
    $rol_session = $_SESSION["rol"];

    require_once '../../conexion/conexion.php';
    print_r($_POST);

    $id_detalle = $_POST['id_detalle'];
    $tareas_id_tarea = $_POST['tarea'];
    $proyectos_id_proyecto = $_POST['proyecto_asignado'];

    
    $consulta = "UPDATE detalle SET tareas_id_tarea = '$tareas_id_tarea', proyectos_id_proyecto = '$proyectos_id_proyecto' where id_detalle = $id_detalle";

    $resultado = mysqli_query($mysqli,$consulta);

    if($resultado == 1){
        
        $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
            VALUES ('UPDATE', 'ha actualizado su tarea id $id_detalle', 'Tareas', now(), '$varsesion')";
            mysqli_query($mysqli, $consulta2);
        }

    header("Location: ../tareas_asignadas.php");

 ?>