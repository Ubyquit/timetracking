<?php

    require_once '../conexion/conexion.php';
    print_r($_POST);



    $proyecto = $_POST['proyecto'];

    $consulta = "INSERT INTO proyectos (nombre_proyecto) VALUES ('$proyecto')";

    mysqli_query($mysqli,$consulta);
    header("Location: proyectos.php");

 ?>