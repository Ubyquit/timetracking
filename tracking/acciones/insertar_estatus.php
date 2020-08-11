<?php

    session_start();
    $varsesion = $_SESSION["id"];
    
    //Archivo de conexión
    require_once '../../conexion/conexion.php';
    //Imprimir variables recibidas
    print_r($_POST);

    //Recibir variables estatus de formulario ubicado en el archivo estatus.php linea 66
    $estatus = $_POST['estatus'];

    $consulta = "INSERT INTO estatus (nombre_estatus) VALUES ('$estatus')";
    $resultado = mysqli_query($mysqli,$consulta);

    if($resultado == 1){
        $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
           VALUES ('INSERT', 'Se ha creado el estatus $estatus', 'estatuss', now(), '$varsesion')";
           mysqli_query($mysqli, $consulta2);
     }

    header("Location: ../lista_estatus.php");

 ?>