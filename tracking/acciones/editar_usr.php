<?php
    session_start();
    $varsesion = $_SESSION["id"];
    if($varsesion == null || $varsesion = ''){
        echo 'Usted no tiene acceso';
        die();
        }
        
    //Apartado de la query
    require_once '../../conexion/conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST['user'];
    $correo = $_POST['email'];
    $password = $_POST['password'];


        
            $consulta = "UPDATE usuarios SET nombre_usr = '$nombre', correo_usr = '$correo', password_usr = '$password' WHERE id_usuario = '$id'";
            $resultado = mysqli_query($mysqli, $consulta);


            if($resultado == 1){
            session_start();
            $varsesion = $_SESSION["id"];
            $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
                VALUES ('UPDATE', 'Se han actualizado los datos del usuario $nombre', 'Usuarios', now(), '$varsesion')";
                mysqli_query($mysqli, $consulta2);
            }

            header("Location: ../usuarios.php");
    ?>