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

        
            $consulta_usuario = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
            $resultado = mysqli_query($mysqli, $consulta_usuario);
            $fila = mysqli_fetch_array($resultado);

            if($fila["roles_id_rol"] == 1){

                session_start();
                $varsesion = $_SESSION["id"];

                $consulta = "UPDATE usuarios SET roles_id_rol = 2 WHERE id_usuario = '$id'";

                $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
                VALUES ('UPDATE', 'Se ha actualizado el permiso del usuario $fila[nombre_usr] a Administrador', 'Usuarios', now(), '$varsesion')";
                mysqli_query($mysqli, $consulta2);


            }else{
                session_start();
                $varsesion = $_SESSION["id"];

                $consulta = "UPDATE usuarios SET roles_id_rol = 1 WHERE id_usuario = '$id'";

                $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
                VALUES ('UPDATE', 'Se ha actualizado el permiso del usuario $fila[nombre_usr] a Limitado', 'Usuarios', now(), '$varsesion')";
                mysqli_query($mysqli, $consulta2);
            }

           mysqli_query($mysqli,$consulta);

           header("Location: usuarios.php");
    ?>
    