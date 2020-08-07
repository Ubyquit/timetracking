<?php
    session_start();

    $varsesion = $_SESSION["id"];
    $user_session = $_SESSION["nombre"];
    $user_email = $_SESSION["email"] ;
    $rol_session = $_SESSION["rol"];

    if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene acceso';
    die();
    }

    ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - timetracking</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">


</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>timetracking</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <?php
                include 'include/navbar.php';
                ?>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            
            <!--Navbar principal-->

            <?php
                include 'include/navsearch.php';
            ?>

            <div class="container-fluid">
                <h3 class="text-dark mb-4">Usuarios</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Lista de usarios</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                            </div>
                            <div class="col-md-6">
                                <!-- Botón crear usuario-->
                                <div class="text-md-right">
                                    <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="register.html"><i class="fas fa-user-plus fa-sm text-white-50"></i>&nbsp;Crear usuario</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Usuarios</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Permisos</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                session_start();
                                $varsesion = $_SESSION["id"];
                                require_once '../conexion/conexion.php';
                                /*Realizar una unión entre la tabla usuarios y la tabla roles y realizar saltos entre campos de ambas tablas para  
                                    visualizar todos los datos requeridos en el modulo de usuarios*/
                                    $consulta = "SELECT * FROM usuarios INNER JOIN roles ON usuarios.roles_id_rol = roles.id_rol
                                    WHERE usuarios.id_usuario !=  $varsesion ORDER BY usuarios.id_usuario";
                                    $resultado = mysqli_query($mysqli, $consulta);
                                    while($fila = mysqli_fetch_array($resultado)){
                                    ?>
                                    <tr>
                                        <!--Imagen predeterminada para usuarios, icono avatar https://robohash.org/-->
                                        <td><img class="rounded-circle mr-2" width="30" height="30" src="https://robohash.org/<?php echo $fila["correo_usr"]; ?>?set=set4"><?php echo $fila["nombre_usr"]; ?></td>
                                        <td><?php echo $fila["correo_usr"]; ?></td>
                                        <td><?php echo $fila["nombre_rol"]; ?></td>
                                        <td><a href="permiso.php?id=<?php echo $fila["id_usuario"]?>" class="btn btn-default btn-rounded">  
                                        <?php  
                                        // Visualizador de cando dependiento al rol de usuario
                                        if($fila["id_rol"] == 2){
                                          echo  '<i class="fa fa-unlock-alt" style="color:green" aria-hidden="true"></i>';
                                        }else{
                                            echo  '<i class="fa fa-lock" style="color:gray" aria-hidden="true"></i>'; 
                                        }?></a></td>
                                        <!--Editar usuario-->
                                        <td><a href="acciones/edicion_usr.php?id=<?php echo $fila["id_usuario"]?>" class="btn btn-default btn-rounded"><i class="fa fa-cog" style="color:orange" aria-hidden="true"></i></td> 
                                        <!--Eliminar usuario-->
                                        <td><a href="acciones/eliminar_usr.php?id=<?php echo $fila["id_usuario"]?>" class="btn btn-default btn-rounded"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></td> 

                                    </tr>
                                    <?php }  ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Usuario</strong></td>
                                        <td><strong>Correo</strong></td>
                                        <td><strong>Rol</strong></td>
                                        <td><strong>Permisos</strong></td>
                                        <td><strong>Editar</strong></td>
                                        <td><strong>Eliminar</strong></td>
                                    </tr>
                                </tfoot>
                            </table>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © timetracking 2020</span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/chart.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>