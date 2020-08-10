<?php

    session_start();
    $varsesion = $_SESSION["id"];
    
    //Archivo de conexión
    require_once '../conexion/conexion.php';
    //Imprimir variables recibidas
    print_r($_POST);

    //Recibir variables proyecto de formulario ubicado en el archivo proyecto.php linea 66
    $proyecto = $_POST['proyecto'];

    $consulta = "INSERT INTO proyectos (nombre_proyecto) VALUES ('$proyecto')";
    $resultado = mysqli_query($mysqli,$consulta);

    if($resultado == 1){
        $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
           VALUES ('INSERT', 'Se ha creado el proyecto $proyecto', 'Proyectos', now(), '$varsesion')";
           mysqli_query($mysqli, $consulta2);
     }

    header("Location: proyectos.php");

 ?>