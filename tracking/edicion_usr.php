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
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;../assets/img/dogs/image4.jpeg&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Editar cuenta!</h4>
                            </div>
                            <?php 
                                session_start();
                                $varsesion = $_SESSION["id"];
                                require_once '../conexion/conexion.php';
                                /*Recibir la variable de id de la pagina de usuario para realizar 
                                la edición de los datos de usuario*/
                                $id = $_GET['id'];

                                    $consulta = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
                                    $resultado = mysqli_query($mysqli, $consulta);
                                    $fila = mysqli_fetch_array($resultado);
                                    ?>
                            <form class="user" action="editar_usr.php" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="user" value="<?php echo $fila["nombre_usr"] ?>"></div>
                                </div>
                                <div class="form-group"><input class="form-control form-control-user" type="email" name="email" value="<?php echo $fila["correo_usr"] ?>"></div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" name="password" value="<?php echo $fila["password_usr"] ?>"></div>
                                </div>
                                <input name="id" value="<?php echo $fila["id_usuario"]?>" type="hidden">  
                                <button class="btn btn-primary btn-block text-white btn-user" type="submit">Cambiar</button>
                                <!--Boton para cancelar operación de editar de usuario-->
                                <a href="usuarios.php" class="btn btn-primary btn-block text-white btn-user">Cancelar</a>
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>