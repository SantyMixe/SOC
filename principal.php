<?php

include ('app/config/config.php');

session_start();

if (isset($_SESSION['u_user'])) {
    //echo "Existe session";
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

//echo $URL;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SG-Bienvenido</title>
    <?php include('layout/head.php'); ?>
</head>

<body
    class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class=" wrapper">

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
                    <a href="<?php echo $URL; ?>principal.php"
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
                    <a class="nav-link" data-toggle="dropdown" href="">
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
        include('layout/menu.php');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Sistema para la Organización de
                                Congresos</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="row ">
                        <?php
            $card = $pdo->prepare("SELECT * FROM tema_taller  WHERE tipo <>'Conferencia' AND estado ='1'");
            $card->execute();            
            $cards = $card->fetchAll(PDO::FETCH_ASSOC);
            foreach ($cards as $cardtaller){
                $id = $cardtaller['id_taller'];
                $poster = $cardtaller['img_taller'];
                $evento = $cardtaller['tipo'];
                $tema = $cardtaller['tema'];
                $descripcion = $cardtaller['descripcion'];
                $horarioE = $cardtaller['horario_entrada'];
                $horarioS = $cardtaller['horario_salida'];
                $nametallerista = $cardtaller['nombre_tallerista'];
                $requesitos = $cardtaller['herramientas'];
                $ubicacion = $cardtaller['ubicacion'];
                $cupos = $cardtaller['cupos'];
                ?>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5 class="card-title m-0">
                                        <h6 class="">Ponente:
                                            <?php echo " ". $nametallerista;?>
                                        </h6>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <?php
                                        $caracter_buscar = ".";
                                        $buscar = strpos($poster,$caracter_buscar);
                                      if($buscar == true){
                                        //echo "Existe foto de perfil";
                                        ?>
                                    <center><img class="card-img-top"
                                            src="<?php echo $URL;?>controllers/posters/<?php echo $poster;?>"
                                            style="width: 200px; height: 150px;"
                                            alt="">
                                    </center>
                                    <?php
                                      }else {
                                        
                                          ?>
                                    <center><img
                                            src="<?php echo $URL;?>public/img/conferencia.png"
                                            style="width: 200px; height: 150px;"
                                            alt=""></center>
                                    <?php
                                        }
                                      ?>
                                    <h6 class="card-title">
                                        Tema:<?php echo " ". $tema;?>
                                    </h6>
                                    <p class="card-text">
                                        <?php echo $descripcion;?>
                                    </p>
                                    <p class="card-text">Requisitos:
                                        <?php echo" ". $requesitos;?>
                                    </p>
                                    <h6 class="card-title">Horario Entrada:
                                        <?php echo " ". $horarioE;?>
                                    </h6><br>
                                    <h6 class="card-title">Horario Salida:
                                        <?php echo " ". $horarioS;?>
                                    </h6><br>
                                    <h6 class="card-title">Ubicación:
                                        <?php echo " ". $ubicacion;?>
                                    </h6><br>
                                    <?php
                                    $contar_tema = $pdo->prepare("SELECT count(*) from participantes WHERE tema_selec = '$tema'and estado <> '0'");
                                    $contar_tema->execute();
                                        $temas = $contar_tema->fetchColumn();
                                    ?>
                                    <h6 class="card-title">Cupos:
                                        <?php echo " ". $cupos."/ ".$temas;?>
                                    </h6>

                                    <br>
                                    <br>
                                    <?php
                                        if($cupos == $temas){
                                        ?>
                                    <h6 class="btn btn-danger float-right">Cupo
                                        lleno</h6>
                                    <?php
                                        }elseif($temas<$cupos){                                        
                                        ?>
                                    <a href="<?php echo $URL;?>participantes/registro_participante.php?id=<?php echo $id; ?>"
                                        class="btn btn-success float-right">Seleccionar
                                        <?php echo $evento;?></a>
                                    <?php    
                                        }else{
                                            ?>
                                    <h6 class="btn btn-danger float-right">Cupo
                                        lleno</h6>
                                    <?php
                                        }
                                        ?>
                                </div>
                            </div>
                            <br>
                        </div>
                        <!-- /.col-md-6 -->
                        <?php
                        }?>
                    </div>
                    <br>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->

                <!-- /.content -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php
        include('layout/footer.php');
        ?>
    </div>



    <!-- ./wrapper -->

    <?php
include('layout/script.php');
?>

</body>

</html>
<?php
} else {
//    echo "No existe session";
    header('Location:'.$URL);
}

?>
