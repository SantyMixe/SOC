<?php

include ('../app/config/config.php');
session_start();
//echo $URL;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
    <?php include('../layout/head.php'); ?>
</head>

<body class="hold-transition layout-top-nav dark-mode">
    <div class="wrapper">

        <!-- Navbar -->
        <nav
            class="main-header navbar navbar-expand-lg navbar-light navbar-dark">
            <div class="container">
                <a href="<?php echo $URL; ?>" class="navbar-brand">
                    <img src="<?php echo $URL; ?>/app/template/dist/img/AdminLTELogo.png"
                        alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">UNEDL</span>
                </a>

                <button class="navbar-toggler order-1" type="button"
                    data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3"
                    id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>"
                                class="nav-link">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>invitacion/invitacion_card.php"
                                class="nav-link">Invitaciones</a>
                        </li>

                    </ul>
                </div>

                <!-- Right navbar links -->
                <ul
                    class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link btn btn-success btn-lg"
                            href="<?php echo $URL; ?>login/">
                            <i class="fas fa-user"></i>
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Registro Invitado</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- Horizontal Form -->
                <center>
                    <div class="card card-info col-md-8 ">
                        <div class="card-header">
                            <h3 class="card-title">Registro Invitado</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal"
                            action="<?php echo $URL; ?>controllers/controller_invitado/controller_invitadoCreate.php"
                            method="post" enctype="multipart/form-data"
                            autocomplete="off">
                            <div class="card-body row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label">Evento
                                            seleccionado</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control"
                                                name="tipoe" value="Congreso"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label">Tema
                                            Propuesta</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control"
                                                name="tema_prop" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label">Descripcion</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control"
                                                name="descripcion"
                                                placeholder="Breve descripcion del tema propuesta."
                                                rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label">Requesito</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control"
                                                name="requesito" id="" cols=""
                                                rows="3"
                                                placeholder="Material requerido para el evento-*Opcional"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label">Nombres</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control"
                                                name="nombres" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label">Apellido
                                            Paterno</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control"
                                                name="apellidoP" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label">Apellido
                                            Materno</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control"
                                                name="apellidoM">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email"
                                                class="form-control"
                                                name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label">Compania</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control"
                                                name="compania" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label">Ocupacion</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control"
                                                name="ocupacion" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputFile"
                                            class="col-sm-4 col-form-label">Reseña</label>
                                        <div class="col-sm-8">
                                            <input type="file"
                                                class="form-control" id="file"
                                                name="file" accept=".pdf"
                                                multiple required>Subir un
                                            archivo
                                            .pdf
                                            <center><br><output id="list"
                                                    required></output>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card-footer">
                                <center>
                                    <a href="<?php echo $URL;?>invitado/invitacion_card.php"
                                        class="btn btn-lg btn-info">Cancelar</a>
                                    <button type="submit"
                                        class="btn btn-success btn-lg">Registrar</button>
                                </center>
                            </div>

                        </form>
                    </div>
                </center>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php
include('../layout/footer.php');
?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php
include('../layout/script.php');
?>
    <?php
        include('../layout/script.php');
        ?>
    <?php
                if(isset($_SESSION['msjInvitR'])){
                $respuesta = $_SESSION['msjInvitR'];
                ?>
    <script>
    Swal.fire(
        'Fallo!',
        '<?php echo $respuesta; ?>',
        'error'
    )
    </script>
    <?php 
                 unset($_SESSION['msjInvitR']);
                } ?>
</body>

</html>
