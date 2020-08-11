<?php
    $usuario = "chalaner_equipo4";
    $password = "Equipo4.2020!";
    $database = "chalaner_timetracking";
    $server = "chalaneros.com";
    $mysqli = mysqli_connect($server, $usuario, $password, $database);
     if(mysqli_connect_errno($mysqli)){
        echo "no me pude conectar ".mysqli_connect_error();
     }else{
       // echo "Yey! si me pude conectar";
     }
?>