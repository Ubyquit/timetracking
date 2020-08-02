<?php
    session_start();

    $varsesion = $_SESSION["id"];
    if($varsesion == null || $varsesion = ''){
        echo 'Usted no tiene acceso';
        die();
        }
        
    //Apartado de la query
    require_once '../conexion/conexion.php';
    $id = $_GET['id'];

        if($varsesion != $id){

            $consulta_usuario = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
            $resultado = mysqli_query($mysqli, $consulta_usuario);
            $fila = mysqli_fetch_array($resultado);

            if($fila["roles_id_rol"] == 1){

                $consulta = "UPDATE usuarios SET roles_id_rol = 2 WHERE id_usuario = '$id'";

            }else{

                $consulta = "UPDATE usuarios SET roles_id_rol = 1 WHERE id_usuario = '$id'";
                
            }

        }
        
    mysqli_query($mysqli,$consulta);
    header("Location: usuarios.php");
    ?>
    