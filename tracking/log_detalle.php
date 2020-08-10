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
                <h3 class="text-dark mb-4">Log detalle</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Historial de cambios por usuario</p>
                    </div>
                    <div class="card-body">
                    <div class="row">
                            <div class="col-md-6 text-nowrap">
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right" id="dataTable_filter">
                                    <form class="form-inline" action="log_detalle.php " method="GET">
                                        <div class="form-group mx-sm-3 mb-2">
                                        <select name="id" class="form-control">
                                                <option selected>Escoge un usuario</option>
                                                <?php
                                                require_once '../conexion/conexion.php';
                                                    /*Listar usuarios*/
                                                    $consulta = "SELECT * FROM usuarios";
                                                    $resultado = mysqli_query($mysqli, $consulta);
                                                    while($fila = mysqli_fetch_array($resultado)){
                                                    echo '<option value="'.$fila[id_usuario].'">'. $fila[nombre_usr].' </option>';
                                                    }
                                                ?>
                                            </select>                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">Ver detalle usuario</button>
                                    </form>
                                </div>
                            </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                    <th>Responsable</th>
                                        <th>Acción</th>
                                        <th>Descripción</th>
                                        <th>Fuente</th>
                                        <th>Fecha cambio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $id = $_GET["id"];
                                        require_once '../conexion/conexion.php';
                                        /*Realizar seleccion de los ultimos 5 movimientos en la tabla logs*/
                                            $consulta = "SELECT * FROM logs INNER JOIN usuarios ON logs.responsable_log = usuarios.id_usuario
                                            WHERE usuarios.id_usuario = '$id'";
                                            $resultado = mysqli_query($mysqli, $consulta);
                                            while($fila = mysqli_fetch_array($resultado)){
                                    ?>
                                    <tr>
                                       <td><?php echo $fila["nombre_usr"]; ?></td>
                                        <td><?php echo $fila["accion_log"]; ?></td>
                                        <td><?php echo $fila["descripcion_log"]; ?></td>
                                        <td><?php echo $fila["fuente_log"]; ?></td>
                                        <td><?php echo $fila["fecha_log"]; ?></td>
                                    </tr>
                                    <?php }  ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td><strong>Responsable</strong></td>
                                        <td><strong>Acción</strong></td>
                                        <td><strong>Descripción</strong></td>
                                        <td><strong>Fuente</strong></td>
                                        <td><strong>Fecha cambio</strong></td>
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
</body>

</html>