<?php

include ('../app/config/config.php');
session_start();
//echo $URL;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistema Congreso | Registrar</title>
    <?php include('../layout/head.php'); ?>
</head>

<body class="hold-transition register-page dark-mode">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?php echo $URL; ?>index.php"
                    class="h1"><b>SOC-Unedl</b></a>
            </div>
            <div class="card-body">
                <p class=" h3 login-box-msg">Registrar</p>

                <form
                    action="<?php echo $URL; ?>controllers/controller_session/controller_registrologin.php"
                    method="post" autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"
                            placeholder="Nombres" name="nombres" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"
                            placeholder="Apellido Paterno" name="apellido_p"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"
                            placeholder="Apllido Materno" name="apellido_m">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
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
                            placeholder="Contraseña" name="password"
                            maxlength="20" minlength="8" title="
* 8 Caracteres 
* Letra Mayuscula 
* Letra Minuscula 
* 1 Dijito *#$%&?._¡
* Un numero" pattern="[A-Za-z*#$%&?._¡0-9]{8,20}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control"
                            placeholder="Repetir Contraseña" name="password2"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <!-- <input type="checkbox" id="agreeTerms"
                                    name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label> -->
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit"
                                class="btn btn-primary btn-block">Registrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="<?php echo $URL;?>login/index.php"
                    class="text-center text-white">Ya tengo una Cuenta</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <?php
include('../layout/script.php');
?>

    <?php
                if(isset($_SESSION['msjLoginR'])){
                $respuesta = $_SESSION['msjLoginR'];
                ?>
    <script>
    Swal.fire(
        'Fallo!',
        '<?php echo $respuesta; ?>',
        'error'
    )
    </script>
    <?php 
                 unset($_SESSION['msjLoginR']);
                } ?>
</body>

</html>
