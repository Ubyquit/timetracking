
          <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <?php
                     if(!isset($_SESSION)) 
                     { 
                         session_start(); 
                     }  
                      if($rol_session == 2){
                        echo  '<li class="nav-item" role="presentation"><a class="nav-link" href="usuarios.php"><i class="fas fa-users"></i><span>Usuarios</span></a></li>';
                        echo  '<li class="nav-item" role="presentation"><a class="nav-link" href="proyectos.php"><i class="fa fa-folder"></i><span>Proyectos</span></a></li>';
                        echo  '<!-- Nav Item - Pages Collapse Menu Tareas -->
                        <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  <i class="fas fa-fw fa fa-tasks"></i>
                                  <span>Tareas</span>
                                </a>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                  <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="tareas.php">Crear tareas</a>
                                    <a class="collapse-item" href="tareas_asignadas.php">Mis tareas</a>
                                    <a class="collapse-item" href="tareas_asignadas_usr.php">Tareas asigandas</a>
                                    <a class="collapse-item" href="tareas_finalizadas.php">Tareas finalizadas</a>
                                  </div>
                                </div>
                          </li>';
                        echo  '<!-- Nav Item - Pages Collapse Menu roles y estatus -->
                        <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                <i class="fas fa-user-cog"></i>
                                  <span>Roles y Estatus</span>
                                </a>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                  <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="lista_permisos.php">Roles</a>
                                    <a class="collapse-item" href="lista_estatus.php">Estatus</a>
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