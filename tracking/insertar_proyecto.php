<?php
    //Archivo de conexión
    require_once '../conexion/conexion.php';
    //Imprimir variables recibidas
    print_r($_POST);

    //Recibir variables proyecto de formulario ubicado en el archivo proyecto.php linea 66
    $proyecto = $_POST['proyecto'];

    $consulta = "INSERT INTO proyectos (nombre_proyecto) VALUES ('$proyecto')";

    mysqli_query($mysqli,$consulta);
    header("Location: proyectos.php");

 ?>