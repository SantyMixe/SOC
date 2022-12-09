<?php

include ('../app/config/config.php');
session_start();
//echo $URL;
//{vWWeYAtRu1=B=WD
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Sistema Congreso | Login</title>
    <?php include('../layout/head.php'); ?>

</head>

<body class="hold-transition login-page dark-mode">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?php echo $URL; ?>index.php"
                    class="h1"><b>SOC-Unedl</b></a>
            </div>
            <div class="card-body">

                <p class="h3 login-box-msg">Iniciar Sesion</p>

                <form
                    action="<?php echo $URL; ?>controllers/controller_session/controllerLogin.php"
                    method="post" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control"
                            placeholder="Email" name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control"
                            placeholder="Contraseña" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <!-- <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label> -->
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit"
                                class="btn btn-primary btn-block"
                                value="ingresar">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <br>
                <p class="mb-1 ">
                    <center><a href="<?php echo $URL;?>login/recuperar.php"
                            class="btn btn-danger">¿Olvidaste
                            Tu contraseña?</a></center>
                </p>
                <p class="mb-0 ">
                    <center><a href="<?php echo $URL;?>login/registrar.php"
                            class="col-8 btn btn-primary text-center">Crear una
                            Cuenta</a>
                    </center>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <?php
        include('../layout/script.php');
        ?>
    <?php
                if(isset($_SESSION['msjLogin'])){
                $respuesta = $_SESSION['msjLogin'];
                ?>
    <script>
    Swal.fire(
        'Fallo!',
        '<?php echo $respuesta; ?>',
        'error'
    )
    </script>
    <?php 
                 unset($_SESSION['msjLogin']);
                } ?>
    <?php
                if(isset($_SESSION['msjLoginR'])){
                $respuesta = $_SESSION['msjLoginR'];
                ?>
    <script>
    Swal.fire(
        'Registrado!',
        '<?php echo $respuesta; ?>',
        'success'
    )
    </script>
    <?php 
                 unset($_SESSION['msjLoginR']);
                } ?>
</body>

</html>
