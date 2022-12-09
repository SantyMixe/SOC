<?php

include ('app/config/config.php');
session_start();
//echo $URL;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a SOC-Unedl</title>
    <?php include('layout/head.php'); ?>
</head>

<body class="hold-transition layout-top-nav dark-mode">
    <div class="wrapper">

        <!-- Navbar -->
        <nav
            class="main-header navbar navbar-expand-lg navbar-light navbar-dark">
            <div class="container">
                <a href="<?php echo $URL; ?>" class="navbar-brand">
                    <img src="<?php echo $URL; ?>/app/template/dist/img/unedl.png"
                        alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">SOC-Unedl</span>
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
                            <a href="<?php echo $URL; ?>invitado/invitacion_card.php"
                                class="nav-link">Convocatorias</a>
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
                <div class="">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Bienvenido al Sistema para la
                                Organización de
                                Congresos</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="">
                    <div class="row">
                        <?php
            $card = $pdo->prepare("SELECT * FROM tema_taller WHERE estado ='1'");
            $card->execute();            
            $cards = $card->fetchAll(PDO::FETCH_ASSOC);
            foreach ($cards as $cardtaller){
                $poster = $cardtaller['img_taller'];
                $evento = $cardtaller['tipo'];
                $tema = $cardtaller['tema'];
                $descripcion = $cardtaller['descripcion'];
                $horarioE = $cardtaller['horario_entrada'];
                $horarioS = $cardtaller['horario_salida'];
                $nametallerista = $cardtaller['nombre_tallerista'];
                $requesitos = $cardtaller['herramientas'];
                $ubicacion = $cardtaller['ubicacion'];
                ?>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title m-0">
                                        <?php echo $evento;?><h6
                                            class="float-right">Ponente:
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
                                    <p class="card-text">Requesitos:
                                        <?php echo" ". $requesitos;?>
                                    </p>
                                    <h6 class="card-title">Horario Entrada:
                                        <?php echo " ". $horarioE;?>
                                    </h6><br>
                                    <h6 class="card-title">Horario Salida:
                                        <?php echo " ". $horarioS;?>
                                    </h6><br>
                                    <h6 class="card-title">Ubicacion:
                                        <?php echo " ". $ubicacion;?>
                                    </h6><br>
                                    <a href="<?php echo $URL;?>login/registrar.php"
                                        class="btn btn-primary float-right">Registrate</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                        <?php
            }?>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php
include('layout/footer.php');
?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php
include('layout/script.php');
?>
    <?php
                if(isset($_SESSION['msjInvitR'])){
                $respuesta = $_SESSION['msjInvitR'];
                ?>
    <script>
    Swal.fire(
        'Registrado!',
        '<?php echo $respuesta; ?>',
        'success'
    )
    </script>
    <?php 
                 unset($_SESSION['msjInvitR']);
                } ?>
</body>

</html>
