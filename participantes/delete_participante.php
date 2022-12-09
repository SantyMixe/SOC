<?php

$id_partic = $_GET['id_partic'];
//conexion a la base de datos (Config.php)
include ('../app/config/config.php');

session_start();

if (isset($_SESSION['u_user'])) {
//     echo "Existe session";
    $user_session = $_SESSION['u_user'];
    $query_session = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$user_session' AND estado ='1' ");
    $query_session->execute();
    $session_users = $query_session->fetchAll(PDO::FETCH_ASSOC);
    foreach ($session_users as $sesion_user){
        $nombre_session = $sesion_user['nombres'];
        $apellidoP_session = $sesion_user['apellido_p'];
        $apellidoM_session = $sesion_user['apellido_m'];
        $cargo_session = $sesion_user['cargo'];
        $fotoP_session = $sesion_user['foto_perfil'];
    }
} else {
//    echo "No existe session";
    header('Location:'.$URL);
}
//echo $URL;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    .thumb {
        height: 200px;
        border: 1px solid #000;
        margin: 10px 5px 0 0;
    }

    </style>
    <title>SG-Registro Usuarios</title>
    <?php include('../layout/head.php'); ?>
</head>

<body
    class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div
            class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble"
                src="<?php echo $URL; ?>/app/template/dist/img/unedl.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"
                        role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo $URL; ?>/principal.php"
                        class="nav-link">Inicio</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo $URL; ?>evento/conferencias.php"
                        class="nav-link">Conferencias</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Cerrar session -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <span style="font-size: 20px; color: red;"><i
                                class="fas fa-power-off"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo $URL; ?>controllers/controller_session/controller_cerrarSesion.php"
                            class="dropdown-item">
                            <i class="fas fa-power-off "></i>&nbsp;&nbsp;Cerrar
                            Session
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#"
                        role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!--                 <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar"
                        data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <?php
          include('../layout/menu.php');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Eliminar Participantes</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- Horizontal Form -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">¿Estas Seguro Eliminar el
                            Participante?</h3>
                    </div>
                    <?php
                            $consulta_participante = $pdo->prepare("SELECT * FROM participantes WHERE id_partic = '$id_partic'");
                            $consulta_participante->execute();
                            $participantes = $consulta_participante->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($participantes as $participante){
                              
                              $id = $participante['id_partic'];
                              $evento = $participante['evento'];
                              $temas_selec = $participante['tema_selec'];
                              $nombres = $participante['nombres'];
                              $apellidoP = $participante['apellido_p'];
                              $apellidoM = $participante['apellido_m'];
                              $horario = $participante['horario'];
                              $ubicacion = $participante['ubicacion'];
                              $pago_total = $participante['pago_total'];
                              $pago_parcial1 = $participante['pago_parcial1'];
                              $pago_parcial2 = $participante['pago_parcial2'];
                              }
                                ?>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for=""
                                    class="col-sm-4 col-form-label">Tipo
                                    Evento</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2bs4"
                                        style="width: 100%;" name="tipo"
                                        disabled>
                                        <option value="<?php echo $evento; ?>"
                                            selected>
                                            <?php echo $evento; ?>

                                        </option>
                                        <option value="Conferencia">
                                            Conferencia</option>
                                        <option value="Taller">Taller
                                        </option>
                                        <option value="Seminario">Seminario
                                        </option>
                                        <option value="Conferencia">
                                            Conferencia
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for=""
                                    class="col-sm-4 col-form-label">Tema</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"
                                        name="tema"
                                        value="<?php echo $temas_selec; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for=""
                                    class="col-sm-4 col-form-label">Nombres y
                                    Apellido</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"
                                        name="nombres"
                                        value="<?php echo $nombres." ".$apellidoP." ".$apellidoM;?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Fecha
                                    y Hora del Evento</label>
                                <div class=" col-sm-4 input-group date"
                                    id="reservationdatetime"
                                    data-target-input="nearest">
                                    <input type="text"
                                        class="form-control datetimepicker-input"
                                        data-target="#reservationdatetime"
                                        name="datetime"
                                        value="<?php echo $horario; ?>"
                                        disabled />
                                    <div class="input-group-append"
                                        data-target="#reservationdatetime"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i
                                                class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for=""
                                    class="col-sm-4 col-form-label">Ubicacion</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"
                                        name="compania"
                                        value="<?php echo $ubicacion; ?>"
                                        disabled>
                                </div>
                            </div>

                            <input type="text" value="<?php echo $id;?>"
                                name="id_invit" hidden>
                        </div>
                    </div>
                    <br>
                    <div class="card-footer">
                        <center>
                            <a href="<?php echo $URL;?>participantes/"
                                class="btn btn-lg btn-info">Cancelar</a>
                            <a href="<?php echo $URL;?>controllers/controller_participantes/controller_delete_participante.php?id_partic=<?php echo $id;?>"
                                class="btn btn-lg btn-danger">Eliminar</a>
                        </center>
                    </div>
                </div>
        </div>
    </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <?php
include('../layout/footer.php');
?>


    </div>
    <!-- ./wrapper -->

    <?php
include('../layout/script.php');
include('../layout/scriptfecha.php');
?>
</body>

</html>
