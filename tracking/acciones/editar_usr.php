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

    header("Location: ../usuarios.php");
    ?>