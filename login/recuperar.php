<?php

include ('../app/config/config.php');

//echo $URL;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistema Congreso | Recuperar</title>
    <?php include('../layout/head.php'); ?>
</head>

<body class="hold-transition login-page dark-mode">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?php echo $URL; ?>index.php"
                    class="h1"><b>SOC-Unedl</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Ingresa tu Email para recuperar
                    contraseña</p>
                <form action="<?php echo $URL; ?>login/correo.php" method="post"
                    autocomplete="off">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control"
                            placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit"
                                class="btn btn-primary btn-block">Continuar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="<?php echo $URL;?>login/"
                        class="btn btn-primary">Login</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <?php
include('../layout/script.php');
?>
</body>

</html>
