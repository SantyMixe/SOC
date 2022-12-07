<?php

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
    <title>SG-Usuarios</title>
    <?php include('../layout/head.php'); ?>
</head>

<body
    class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div
            class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble"
                src="<?php echo $URL; ?>/app/template/dist/img/AdminLTELogo.png"
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
                            <h1 class="m-0">Invitados Aprobados</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Invitado Aprobado
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1"
                            class="table table-bordered table-striped table-sm table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Evento</th>
                                    <th>Nombre Invitado</th>
                                    <th>Email</th>
                                    <th>Compania</th>
                                    <th>Ocupacion</th>
                                    <th>Reseña</th>
                                    <th>Acciones</th>
                                    <th>Seleccion</th>
                                </tr>
                            </thead>
                            <?php
                            $contar_invitado =0;
                              $consulta_invitado = $pdo->prepare("SELECT * FROM invitado WHERE estado = '2'");
                              $consulta_invitado->execute();
                              $invitados = $consulta_invitado->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($invitados as $invitado){
                                
                                $id = $invitado['id_invitado'];
                                $tipo = $invitado['tipoe'];
                                $nombre = $invitado['nombres'];
                                $apellidoP = $invitado['apellidoP'];
                                $apellidoM = $invitado['apellidoM'];
                                $email = $invitado['email'];
                                $compania = $invitado['compania'];
                                $ocupacion = $invitado['ocupacion'];
                                $resenia = $invitado['resenia'];
                                $contar_invitado = $contar_invitado +1;
                                ?>

                            <tr>
                                <td>
                                    <center><?php echo $contar_invitado;?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $tipo;?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $nombre." ".$apellidoP." ".$apellidoM;?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $email;?>
                                    </center>
                                </td>
                                <td>
                                    <center><?php echo $compania;?>
                                    </center>
                                </td>
                                <td>
                                    <center><?php echo $ocupacion;?> </center>
                                </td>
                                <td>
                                    <center>
                                        <?php
                                        $caracter_buscar = ".";
                                        $buscar = strpos($resenia,$caracter_buscar);
                                      if($buscar == true){
                                        //echo "Existe foto de perfil";
                                        ?><a
                                            href="<?php echo $URL;?>controllers/controller_invitado/reseña/<?php echo $resenia;?>"
                                            target="_blank"
                                            class="btn btn-info"><i
                                                class="fa-solid fa-file-pdf"
                                                aria-hidden="true"></i> Ver
                                            reseña</a><?php
                                      }else {
                                        
                                          ?>
                                    </center>
                                    <?php
                                        }
                                      ?>
                                </td>
                                <th>
                                    <center>
                                        <a href="update_invitado.php?id_invit=<?php echo $id; ?>"
                                            class="btn btn-success btn-sm"><span
                                                class="fa-solid fa-pen-to-square"></span>
                                            Editar</a>
                                        <!-- |
                                        <a href="delete_invitado.php?id_invit=<?php echo $id; ?>"
                                            class="btn btn-danger btn-sm"><span
                                                class="fa-solid fa-trash"></span>
                                            Eliminar</a> -->
                                    </center>
                                </th>
                                <td>
                                    <center>
                                        <a href="cancel_invitado.php?id_invitcancel=<?php echo $id; ?>"
                                            class="btn btn-danger btn-sm"><span
                                                class="fa-solid fa-pen-to-square"></span>
                                            Cancelar Invitado</a>
                                    </center>
                                </td>
                            </tr>
                            <?php
                              }
                            ?>
                            <!-- <tfoot>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th>Platform(s)</th>
                                    <th>Engine version</th>
                                    <th>CSS grade</th>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class=" control-sidebar control-sidebar-dark">
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
?>
</body>

</html>
