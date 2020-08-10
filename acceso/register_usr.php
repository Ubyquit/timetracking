 <?php
   session_start();
   $varsesion = $_SESSION["id"]; 

    require_once '../conexion/conexion.php';
    print_r($_POST);



    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $consulta = "INSERT INTO usuarios (nombre_usr, correo_usr, password_usr, roles_id_rol)
    VALUES ('$user','$email','$password',1)";
    $resultado = mysqli_query($mysqli,$consulta);

    if($resultado == 1){
         $consulta2 =  "INSERT INTO logs (accion_log, descripcion_log, fuente_log, fecha_log, responsable_log) 
            VALUES ('INSERT', 'Se ha registrado al usuario $user', 'Usuarios', now(), '$varsesion')";
            mysqli_query($mysqli, $consulta2);
      }

    header("Location: ../tracking/usuarios.php");

 ?>