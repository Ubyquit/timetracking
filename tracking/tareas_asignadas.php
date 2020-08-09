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
                <h3 class="text-dark mb-4">Tareas</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Lista de mis tareas</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                            </div>
                            <div class="col-md-6">
                                <!-- Botón crear tarea-->
                                <div class="text-md-right">
                                <?php 
                                if($rol_session == 2){
                                    echo '<a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="asignar_tarea.php"><i class="fas fa-link fa-sm text-white-50"></i>&nbsp;Asignar tarea</a>';
                                }else{
                                    echo '<a class="btn btn-info btn-sm d-none d-sm-inline-block" role="button" href="asignar_tarea_limitado.php"><i class="fas fa-link fa-sm text-white-50"></i>&nbsp;Asignar tarea</a>';
                                }
                                ?>    
                            </div>
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
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                session_start();

                                $varsesion = $_SESSION["id"];
                                require_once '../conexion/conexion.php';
                                /*Realizar una unión entre la tabla usuarios y la tabla roles y realizar saltos entre campos de ambas tablas para  
                                    visualizar todos los datos requeridos en el modulo de usuarios*/
                                    $consulta = "SELECT
                                    id_detalle,
                                    tareas_id_tarea,
                                    proyectos_id_proyecto,
                                    id_responsable,
                                    tareas.nombre_tarea,
                                    proyectos.nombre_proyecto,
                                    usuario1.nombre_usr as usuario1,
                                    usuario2.nombre_usr as usuario2,
                                    fecha_asignacion,
                                    fecha_inicio,
                                    fecha_fin,
                                    estatus.nombre_estatus
                                    FROM detalle
                                    INNER JOIN tareas ON detalle.tareas_id_tarea = tareas.id_tarea
                                    INNER JOIN proyectos ON detalle.proyectos_id_proyecto = proyectos.id_proyecto
                                    INNER JOIN usuarios as usuario1 on detalle.id_asignador = usuario1.id_usuario
                                    INNER JOIN usuarios as usuario2 on detalle.id_responsable = usuario2.id_usuario
                                    INNER JOIN estatus ON detalle.estatus_id_estatus = estatus.id_estatus
                                    WHERE detalle.id_responsable = '$varsesion' AND detalle.estatus_id_estatus != 3";
                                    $resultado = mysqli_query($mysqli, $consulta);
                                    while($fila = mysqli_fetch_array($resultado)){
                                    ?>
                                    <tr>
                                        <td><?php echo $fila["nombre_tarea"]; ?></td>
                                        <td><?php echo $fila["nombre_proyecto"]; ?></td>
                                        <td><?php echo $fila["usuario1"]; ?></td>
                                        <td><?php echo $fila["usuario2"]; ?></td>
                                        <td><?php echo $fila["fecha_asignacion"]; ?></td>
                                        <td>
                                            <?php if($fila["fecha_inicio"] == NULL){
                                                echo '<a href="fecha_inicio.php?id='.$fila[id_detalle].'" class="btn btn-default btn-rounded"><i class="fa fa-clock" style="color:green" aria-hidden="true"></i>';
                                            }else{
                                                echo $fila["fecha_inicio"]; 
                                            }
                                            ?>
                                        </td>
                                        <td>
                                        <?php if($fila["fecha_fin"] == NULL && $fila["fecha_inicio"] != NULL){
                                                echo '<a href="fecha_fin.php?id='.$fila[id_detalle].'" class="btn btn-default btn-rounded"><i class="fa fa-check" style="color:green" aria-hidden="true"></i>';
                                            }else{
                                                echo $fila["fecha_fin"]; 
                                            }
                                            ?>
                                        </td>
                                        <!--Editar Tarea-->
                                        <td>
                                            <?php 
                                            if($rol_session == 2){
                                                echo '<form action="acciones/editar_mi_tarea.php" method="post">';
                                            }else{
                                                echo '<form action="acciones/editar_mi_tarea_limitado.php" method="post">';
                                            }
                                            ?>
                                        <input name="id_detalle" value="<?php echo $fila["id_detalle"] ?>" type="hidden">
                                        <input name="asignar_tarea" value="<?php echo $fila["tareas_id_tarea"] ?>" type="hidden">
                                        <input name="asignar_proyecto" value="<?php echo $fila["proyectos_id_proyecto"] ?>" type="hidden">
                                        <input name="asignar_responsable" value="<?php echo $fila["id_responsable"] ?>" type="hidden">
                                        
                                        <?php 
                                        if($fila["usuario1"] == $fila["usuario2"]){
                                            echo '<button class="btn" type="submit"><i class="fa fa-cog" style="color:orange" aria-hidden="true"></i></button>';
                                        }
                                        
                                        ?>
                                        
                                        
                                            </form>
                                        </td>
                                        
                                        <!--Eliminar usuario-->
                                        <td><?php 
                                        if($fila["usuario1"] == $fila["usuario2"]){
                                            echo '<a href="acciones/eliminar_asignaciones.php?id='; 
                                            echo $fila["id_detalle"]; 
                                            echo '" class="btn btn-default btn-rounded"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i>';
                                        }?></td> 
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
                                        <td><strong>Editar</strong></td>
                                        <td><strong>Eliminar</strong></td>
                                        <td><strong>Estatus</strong></td>
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