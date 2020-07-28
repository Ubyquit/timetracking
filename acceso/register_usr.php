 <?php

    require_once '../conexion/conexion.php';
    print_r($_POST);



    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $consulta = "INSERT INTO usuarios (nombre_usr, correo_usr, password_usr, roles_id_rol) VALUES ('$user','$email','$password',1)";

    mysqli_query($mysqli,$consulta);
    header("Location: ../index.html");

 ?>