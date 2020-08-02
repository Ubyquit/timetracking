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
                include 'navbar.php';
                ?>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            
            <!--Navbar principal-->

            <?php
                include 'navsearch.php';
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
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Tarea</th>
                                        <th>Proyecto</th>
                                        <th>Asignador</th>
                                        <th>Responsable</th>
                                        <th>Fecha de asignación</th>
                                        <th>Fecha inicio</th>
                                        <th>Fecha final</th>
                                        <th>Tiempo restante</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                require_once '../conexion/conexion.php';
                                /*Realizar una unión entre la tabla usuarios y la tabla roles y realizar saltos entre campos de ambas tablas para  
                                    visualizar todos los datos requeridos en el modulo de usuarios*/
                                    $consulta = "SELECT
                                    id_detalle,
                                    tareas.nombre_tarea,
                                    proyectos.nombre_proyecto,
                                    usuario1.nombre_usr as usuario1,
                                    usuario2.nombre_usr as usuario2,
                                    fecha_asignacion,
                                    fecha_inicio,
                                    fecha_fin,
                                    DATEDIFF(fecha_fin,now()) AS tiempo_restante,
                                    estatus.nombre_estatus
                                    FROM detalle
                                    INNER JOIN tareas ON detalle.tareas_id_tarea = tareas.id_tarea
                                    INNER JOIN proyectos ON detalle.proyectos_id_proyecto = proyectos.id_proyecto
                                    INNER JOIN usuarios as usuario1 on detalle.id_asignador = usuario1.id_usuario
                                    INNER JOIN usuarios as usuario2 on detalle.id_responsable = usuario2.id_usuario
                                    INNER JOIN estatus ON detalle.estatus_id_estatus = estatus.id_estatus";
                                    $resultado = mysqli_query($mysqli, $consulta);
                                    while($fila = mysqli_fetch_array($resultado)){
                                    ?>
                                    <tr>
                                        <td><?php echo $fila["nombre_tarea"]; ?></td>
                                        <td><?php echo $fila["nombre_proyecto"]; ?></td>
                                        <td><?php echo $fila["usuario1"]; ?></td>
                                        <td><?php echo $fila["usuario2"]; ?></td>
                                        <td><?php echo $fila["fecha_asignacion"]; ?></td>
                                        <td><?php echo $fila["fecha_inicio"]; ?></td>
                                        <td><?php echo $fila["fecha_fin"]; ?></td>
                                        <td><?php echo $fila["tiempo_restante"]; ?></td>
                                        <td><?php echo $fila["nombre_estatus"]; ?></td>
                                    </tr>
                                    <?php }  ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Tarea</strong></td>
                                        <td><strong>Proyecto</strong></td>
                                        <td><strong>Asignador</strong></td>
                                        <td><strong>Responsable</strong></td>
                                        <td><strong>Fecha de asignación</strong></td>
                                        <td><strong>Fecha inicio</strong></td>
                                        <td><strong>Fecha final</strong></td>
                                        <td><strong>Tiempo restante</strong></td>
                                        <td><strong>Estatus</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                            </div>
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
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