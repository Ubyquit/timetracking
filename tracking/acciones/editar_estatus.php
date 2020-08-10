<?php
    session_start();
    $varsesion = $_SESSION["id"];
        
    //Apartado de la query
    require_once '../../conexion/conexion.php';
    $id = $_POST['id'];
    $efirstname = $_POST['editar_estatus'];

            $consulta = "UPDATE estatus SET nombre_estatus = '$efirstname' WHERE id_estatus = '$id'";
            $resultado = mysqli_query($mysqli, $consulta);

            if($resultado == 1){
                $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
                   VALUES ('UPDATE', 'Se ha actulizado el estatus a $efirstname', 'Estatus', now(), '$varsesion')";
                   mysqli_query($mysqli, $consulta2);
             }
       

    header("Location: ../lista_estatus.php");
?>