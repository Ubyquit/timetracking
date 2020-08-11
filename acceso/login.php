<?php
require_once '../conexion/conexion.php';
print_r($_POST);
$email = $_POST['email'];
$password = $_POST['password'];
//se reciben las variables del archivo index
$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$email'";
      $resultado = mysqli_query($mysqli, $consulta);
      $fila = mysqli_fetch_array($resultado);
      $respuesta = '';
      if(sizeof($fila) > 0){
          if($fila["password_usr"] == $password){
              session_start();
              $_SESSION["id"] = $fila["id_usuario"];
              $_SESSION["nombre"] = $fila["nombre_usr"];
              $_SESSION["email"] = $fila["correo_usr"];
              $_SESSION["rol"] = $fila["roles_id_rol"];
              $respuesta = 1;
          }else{
            $respuesta = "La contraseña no coincide";
          }
        }else{
            $respuesta = "Usuario no encontrado";  
      }
      
      if($respuesta==1){

        header('Location: ../tracking/index.php');

      }else{
        header('Location: ../index.html'); 
      }
?>