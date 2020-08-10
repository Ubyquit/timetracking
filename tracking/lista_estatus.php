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
                <h3 class="text-dark mb-4">estatus</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Lista de estatus</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right" id="dataTable_filter">
                                    <form class="form-inline" action="acciones/insertar_estatus.php" method="post">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="text" class="form-control" name="estatus" placeholder="Nuevo estatus" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">Crear estatus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Número Estatus</th>
                                        <th>Nombre del estatus</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $contador = 1;
                                require_once '../conexion/conexion.php';
                                /*Listar todos los estatus*/
                                    $consulta = "SELECT * FROM estatus";
                                    $resultado = mysqli_query($mysqli, $consulta);
                                    while($fila = mysqli_fetch_array($resultado)){
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $contador; ?></td>
                                        <td id="nombreestatus<?php echo $fila['id_estatus'];?>" ><?php 
                                        //Condición para evitar borrar o modificar los estatus por defecto
                                        if($fila['id_estatus'] == 1 or $fila['id_estatus'] == 2 or $fila['id_estatus'] == 3){
                                            echo $fila['nombre_estatus']; 
                                            echo ' <i class="fas fa-lock"></i>';
                                        }else{
                                            echo $fila['nombre_estatus']; 
                                        }?></td>

                                         <!--Editar estatus-->
                                        <td><button type="button" class="btn edit" value="<?php 
                                        //Condición para evitar borrar o modificar los estatus por defecto
                                        if($fila['id_estatus'] == 1 or $fila['id_estatus'] == 2 or $fila['id_estatus'] == 3){
                                        }else{
                                            echo $fila['id_estatus']; 
                                        }?>"><i class="fa fa-cog" style="color:orange" aria-hidden="true"></i></button></td>
                                        
                                        <!--Eliminar estatus-->
                                        <td><a href="acciones/eliminar_estatus.php?id=<?php 
                                        //Condición para evitar borrar o modificar los estatus por defecto
                                        if($fila['id_estatus'] == 1 or $fila['id_estatus'] == 2 or $fila['id_estatus'] == 3){
                                        }else{
                                            echo $fila['id_estatus']; 
                                        }?>" class="btn btn-default btn-rounded"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></td>
                                    </tr>
                                    <?php 
                                    $contador ++;
                                }  ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Número Estatus</strong></td>
                                        <td><strong>Nombre de estatus</strong></td>
                                        <td><strong>Editar</strong></td>
                                        <td><strong>Eliminar</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
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

    <!--Modal para editar el estatus, este modal recibe el id del archivo js/custom_edit_estatus.js-->
    <script src="js/custom_edit_estatus.js"></script>
    <?php include('modal/modal_edit_estatus.php'); ?>
    
</body>

</html>