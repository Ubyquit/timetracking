<?php

    session_start();
    $varsesion = $_SESSION["id"];
    
    //Archivo de conexión
    require_once '../../conexion/conexion.php';
    //Imprimir variables recibidas
    print_r($_POST);

    //Recibir variables permiso de formulario ubicado en el archivo permiso.php linea 66
    $permiso = $_POST['permiso'];

    $consulta = "INSERT INTO roles (nombre_rol) VALUES ('$permiso')";
    $resultado = mysqli_query($mysqli,$consulta);

    if($resultado == 1){
        $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
           VALUES ('INSERT', 'Se ha creado el permiso $permiso', 'Roles', now(), '$varsesion')";
           mysqli_query($mysqli, $consulta2);
     }

    header("Location: ../lista_permisos.php");

 ?>