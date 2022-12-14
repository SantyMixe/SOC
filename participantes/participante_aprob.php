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
                            <h1 class="m-0">Eventos</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista Eventos Aprobados
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1"
                            class="table table-bordered table-striped table-sm table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>N??</th>
                                    <th>Evento</th>
                                    <th>Tema Seleccionado</th>
                                    <th>Nombres</th>
                                    <th>Horario</th>
                                    <th>Ubicaci??n</th>
                                    <th>Pago Total</th>
                                    <th>Pago Parcial 1</th>
                                    <th>Pago Parcial 2</th>
                                    <?php
                                    if($cargo_session=="Prefect@"){
                                    ?>
                                    <?php
                                    }if($cargo_session=="Alumno"){
                                    ?>
                                    <th>Acciones</th>
                                    <th>Completar</th>
                                    <?php
                                    }if($cargo_session=="Administrador"){
                                    ?>
                                    <th>Acciones</th>
                                    <th>Selecci??n</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <?php
                            $contar_participante =0;
                            if($cargo_session=="Administrador"){
                                $consulta_participante = $pdo->prepare("SELECT * FROM participantes WHERE  estado = '2'");
                              }if($cargo_session=="Alumno"){
                                  $consulta_participante = $pdo->prepare("SELECT * FROM participantes WHERE email='$user_session' AND estado = '2'");
                              }if($cargo_session=="Prefect@"){
                                  $consulta_participante = $pdo->prepare("SELECT * FROM participantes WHERE estado = '2'");
                              }
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
                                
                                $contar_participante = $contar_participante +1;
                                ?>

                            <tr>
                                <td>
                                    <center><?php echo $contar_participante;?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $evento;?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $temas_selec;?>
                                    </center>
                                </td>
                                <td>
                                    <?php echo $nombres." ".$apellidoP." ".$apellidoM;?>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $horario; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?php echo $ubicacion; ?>
                                    </center>
                                </td>
                                <td>
                                    <?php
                                        $caracter_buscar = ".";
                                        $buscar = strpos($pago_total,$caracter_buscar);
                                      if($buscar == true){
                                        //echo "Existe foto de perfil";
                                        ?>
                                    <center><a
                                            href="<?php echo $URL;?>controllers/controller_participantes/pago_img/<?php echo $pago_total;?>"
                                            target="_blank"><img
                                                src="<?php echo $URL;?>controllers/controller_participantes/pago_img/<?php echo $pago_total;?>"
                                                width="50px" alt=""></a>
                                        <?php
                                      }else {
                                        
                                          ?>
                                        <center></center>
                                        <?php
                                        }
                                      ?>
                                </td>
                                <td>
                                    <?php
                                        $caracter_buscar = ".";
                                        $buscar = strpos($pago_parcial1,$caracter_buscar);
                                      if($buscar == true){
                                        //echo "Existe foto de perfil";
                                        ?>
                                    <center><a
                                            href="<?php echo $URL;?>controllers/controller_participantes/pago_img/<?php echo $pago_parcial1;?>"
                                            target="_blank"><img
                                                src="<?php echo $URL;?>controllers/controller_participantes/pago_img/<?php echo $pago_parcial1;?>"
                                                width="50px" alt=""></a>
                                    </center>
                                    <?php
                                      }else {
                                        
                                          ?>
                                    <center></center>
                                    <?php
                                        }
                                      ?>
                                </td>
                                <td>
                                    <?php
                                        $caracter_buscar = ".";
                                        $buscar = strpos($pago_parcial2,$caracter_buscar);
                                      if($buscar == true){
                                        //echo "Existe foto de perfil";
                                        ?>
                                    <center><a
                                            href="<?php echo $URL;?>controllers/controller_participantes/pago_img/<?php echo $pago_parcial2;?>"
                                            target="_blank"><img
                                                src="<?php echo $URL;?>controllers/controller_participantes/pago_img/<?php echo $pago_parcial2;?>"
                                                width="50px" alt=""></a>
                                    </center>
                                    <?php
                                      }else {
                                        
                                          ?>
                                    <center></center>
                                    <?php
                                        }
                                      ?>
                                </td>

                                <?php
                                    if($cargo_session=="Administrador"){
                                    ?>
                                <td>
                                    <center>
                                        <a href="update_participante.php?id_partic=<?php echo $id; ?>"
                                            class="btn btn-success btn-sm"><span
                                                class="fa-solid fa-pen-to-square"></span>
                                            Editar</a>
                                        |
                                        <a href="delete_participante.php?id_partic=<?php echo $id; ?>"
                                            class="btn btn-danger btn-sm"><span
                                                class="fa-solid fa-trash"></span>
                                            Eliminar</a>
                                    </center>
                                <td>
                                    <?php
                                    }if($cargo_session=="Alumno"){
                                    ?>
                                <td>
                                    <center>
                                        <a href="delete_participante.php?id_partic=<?php echo $id; ?>"
                                            class="btn btn-danger btn-sm"><span
                                                class="fa-solid fa-trash"></span>
                                            Eliminar</a>
                                    </center>
                                <td>

                                    <?php   } ?>


                                    <?php
                                if($cargo_session=="Administrador"){
                                    ?>

                                    <center>
                                        <a href="cancel_participante.php?id_particcancel=<?php echo $id; ?>"
                                            class="btn btn-danger btn-sm"><span
                                                class="fa-solid fa-pen-to-square"></span>
                                            Cancelar Participante</a>
                                    </center>
                                    <?php
                                    }if($cargo_session=="Prefect@"){
                                    ?>
                                    <?php
                                    }if($cargo_session=="Alumno"){
                                    ?>

                                    <a href="update_participante.php?id_partic=<?php echo $id; ?>"
                                        class="btn btn-success btn-sm"><span
                                            class="fa-solid fa-pen-to-square"></span>
                                        Subir Pago</a>
                                    </center>

                                    <?php   } ?>

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
