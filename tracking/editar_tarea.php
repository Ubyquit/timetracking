<?php
    session_start();
    $varsesion = $_SESSION["id"];
    if($varsesion == null || $varsesion = ''){
        echo 'Usted no tiene acceso';
        die();
        }
        
    //Apartado de la query
    require_once '../conexion/conexion.php';
    $id = $_POST['id'];
    $efirstname = $_POST['editar_tarea'];

            $consulta = "UPDATE tareas SET nombre_tarea = '$efirstname' WHERE id_tarea = '$id'";
            $resultado = mysqli_query($mysqli, $consulta);

    header("Location: tareas.php");
?>