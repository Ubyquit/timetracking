<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - timetracking</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;../assets/img/dogs/image5.jpeg&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Asignar Tarea!</h4>
                            </div>
                            <form class="user" action="crear_asignacion_tarea_limitado.php" method="post">

                                <!--Lista tareas-->
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="inputState">Asignar tarea</label>
                                            <select name="tarea" class="form-control">
                                                <option selected>Escoge una tarea</option>
                                                <?php
                                                session_start();
                                                $varsesion = $_SESSION["id"];
                                                require_once '../conexion/conexion.php';
                                                    /*Listar mis tareas*/
                                                    $consulta = "SELECT * FROM tareas
                                                    WHERE usuarios_id_usuario = $varsesion";
                                                    $resultado = mysqli_query($mysqli, $consulta);
                                                    while($fila = mysqli_fetch_array($resultado)){
                                                    echo '<option value="'.$fila[id_tarea].'">'. $fila[nombre_tarea].' </option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <!--Lista tareas-->
                                <!--Lista proyectos-->
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="inputState">Asignar a proyecto</label>
                                            <select name="proyecto_asignado" class="form-control">
                                                <option selected>Escoge un proyecto</option>
                                                <?php
                                                require_once '../conexion/conexion.php';
                                                    /*Listar proyectos*/
                                                    $consulta = "SELECT * FROM proyectos";
                                                    $resultado = mysqli_query($mysqli, $consulta);
                                                    while($fila = mysqli_fetch_array($resultado)){
                                                    echo '<option value="'.$fila[id_proyecto].'">'. $fila[nombre_proyecto].' </option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <!--Lista proyectos-->
                                    <button class="btn btn-primary btn-block text-white btn-user" type="submit">Insertar datos</button>
                                <!--Boton para cancelar operación de inserción de usuarios-->
                                <a href="tareas_asignadas.php" class="btn btn-primary btn-block text-white btn-user">Cancelar</a>

                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
$("#datetime").datetimepicker({
    format: 'yyyy-mm-dd hh:ii'
});
</script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>   
</body>

</html>