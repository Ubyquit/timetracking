<?php
    session_start();

    $varsesion = $_SESSION["id"];
    $user_session = $_SESSION["nombre"];
    $user_email = $_SESSION["email"] ;
    $rol_session = $_SESSION["rol"];

    if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene acceso';
    }
    ?>

<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                            <?php     
                                        require_once '../conexion/conexion.php';
                                        /*Realizar una unión entre la tabla usuarios y la tabla roles y realizar saltos entre campos de ambas tablas para  
                                            visualizar todos los datos requeridos en el modulo de usuarios*/
                                            $consulta = "SELECT count(*) as contar FROM logs ";
                                            $resultado = mysqli_query($mysqli, $consulta);
                                            $fila = mysqli_fetch_array($resultado);
                                        ?>
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="badge badge-danger badge-counter"><?php echo $fila["contar"]; ?></span><i class="fas fa-bell fa-fw"></i></a>
                               
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>

                                        <?php
                                        require_once '../conexion/conexion.php';
                                        /*Realizar seleccion de los ultimos 5 movimientos en la tabla logs*/
                                            $consulta = "SELECT * FROM logs  ORDER BY id_log DESC LIMIT 5 ";
                                            $resultado = mysqli_query($mysqli, $consulta);
                                            while($fila = mysqli_fetch_array($resultado)){
                                        ?>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500"><?php echo $fila["fecha_log"]; ?></span>
                                                <p><?php echo $fila["descripcion_log"]; ?></p>
                                            </div>
                                        </a>
                                        <?php }  ?>
                                        <a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                    <?php     
                                        require_once '../conexion/conexion.php';
                                        /*Realizar visualización de usuarios nuevos contador*/
                                            $consulta = "SELECT count(*) as contar_usr FROM usuarios ";
                                            $resultado = mysqli_query($mysqli, $consulta);
                                            $fila = mysqli_fetch_array($resultado);
                                        ?>
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-envelope fa-fw"></i><span class="badge badge-danger badge-counter"><?php echo $fila["contar_usr"]; ?></span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <?php
                                        require_once '../conexion/conexion.php';
                                        /*Realizar seleccion de los ultimos 5 movimientos en la tabla logs*/
                                            $consulta = "SELECT * FROM usuarios  ORDER BY id_usuario DESC LIMIT 5 ";
                                            $resultado = mysqli_query($mysqli, $consulta);
                                            while($fila = mysqli_fetch_array($resultado)){
                                        ?>
                                        
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="https://robohash.org/<?php echo $fila["correo_usr"]; ?>?set=set4">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Nuevo usuario! <?php echo $fila["nombre_usr"]; ?></span></div>
                                                <p class="small text-gray-500 mb-0"><?php echo $fila["correo_usr"]; ?></p>
                                            </div>
                                        </a>
                                        <?php }  ?>
                                        <a class="text-center dropdown-item small text-gray-500" href="usuarios.php">Show All Alerts</a></div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                <!--Imagen predeterminada para usuarios, icono avatar https://robohash.org/-->
                                <span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo strtoupper($user_session)?></span><img class="border rounded-circle img-profile" src="https://robohash.org/<?php echo $user_email; ?>"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">                                  
                                        <?php 
                                        //Validación de la cuenta para visualizar el Activity log
                                        if($rol_session == 2){
                                          echo  '<a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>';
                                        }
                                                                       
                                        ?>
                                        <!--Logout-->
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="../acceso/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>