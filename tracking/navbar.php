
<?php
    session_start();

    $varsesion = $_SESSION["id"];
    $user_session = $_SESSION["nombre"];
    $rol_session = $_SESSION["rol"];
    if($varsesion == null || $varsesion = ''){
    echo 'Usted no tiene acceso';
    }
    ?>

<ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <?php 
                      if($rol_session == 2){
                        echo  '<li class="nav-item" role="presentation"><a class="nav-link" href="usuarios.php"><i class="fas fa-table"></i><span>Usuarios</span></a></li>';
                        echo  '<li class="nav-item" role="presentation"><a class="nav-link" href="proyectos.php"><i class="fa fa-folder"></i><span>Proyectos</span></a></li>';
                        echo  '<li class="nav-item" role="presentation"><a class="nav-link" href="tareas.php"><i class="fa fa-tasks"></i><span>Tareas</span></a></li>';
                        echo  '<li class="nav-item" role="presentation"><a class="nav-link" href="log_general.php"><i class="fa fa-list-alt"></i><span>Log General</span></a></li>';
                      }else{
                      }

                      ?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="blank.php"><i class="fas fa-user"></i><span>Blank</span></a></li>
 </ul>