<?php
    session_start();
    $varsesion = $_SESSION["id"];

    //Apartado de la query
    require_once '../../conexion/conexion.php';
    $id = $_GET['id'];


    $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
    VALUES ('DELETE', 'Se ha eliminado el estatus con el id $id', 'Estatus', now(), '$varsesion')";
    $resultado2 =mysqli_query($mysqli, $consulta2);

         if($resultado2 == 1){
                $id = $_GET['id'];
                $consulta = "DELETE FROM estatus WHERE id_estatus = '$id'";
                 $resultado = mysqli_query($mysqli, $consulta);
             }
       

    header("Location: ../lista_estatus.php");
    ?>