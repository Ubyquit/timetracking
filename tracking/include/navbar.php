
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
                        echo  '<!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                  <i class="fas fa-fw fa fa-tasks"></i>
                                  <span>Tareas</span>
                                </a>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                  <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="tareas.php">Crear tareas</a>
                                    <a class="collapse-item" href="tareas_asignadas.php">Mis tareas</a>
                                    <a class="collapse-item" href="tareas_asignadas_usr.php">Tareas asigandas</a>
                                    <a class="collapse-item" href="tareas_finalizadas.php">Tareas finalizadas</a>
                                  </div>
                                </div>
                              </li>';
                        echo  '<li class="nav-item" role="presentation"><a class="nav-link" href="log_general.php"><i class="fa fa-list-alt"></i><span>Log General</span></a></li>';
                      }else{
                        echo  '<!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                  <i class="fas fa-fw fa fa-tasks"></i>
                                  <span>Tareas</span>
                                </a>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                  <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="tareas.php">Crear tareas</a>
                                    <a class="collapse-item" href="tareas_asignadas.php">Mis tareas</a>
                                    <a class="collapse-item" href="tareas_finalizadas.php">Tareas finalizadas</a>
                                  </div>
                                </div>
                              </li>';
                      }

                      ?>
 </ul>