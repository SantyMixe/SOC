<?php

include ('../app/config/config.php');

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
                            <h1 class="m-0"> Bienvenido al Congreso</h1>
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
            $consulta_convoc = $pdo->prepare("SELECT * FROM convocatoria WHERE estado='1' ");
            $consulta_convoc->execute();
            $convocs = $consulta_convoc->fetchAll(PDO::FETCH_ASSOC);
            foreach ($convocs as $convoc){
              
              $id = $convoc['id_convocatoria'];
              $tipo_convoc = $convoc['tipo_evento'];
              $descripcion = $convoc['descripcion'];
              $ubicacion = $convoc['ubicacion'];
              $telefono = $convoc['telefono'];
              $fecha = $convoc['fecha'];
              $img_convo = $convoc['img_convo'];
                ?>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title m-0">
                                        <?php  echo $tipo_convoc;?><h6
                                            class="float-right">
                                            <?php //echo " ". $tipo_convoc;?>
                                        </h6>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <?php
                                       $caracter_buscar = ".";
                                        $buscar = strpos($img_convo,$caracter_buscar);
                                      if($buscar == true){
                                        //echo "Existe foto de perfil"; 
                                        ?>
                                    <center><img class="card-img-top"
                                            src="<?php echo $URL;?>controllers/controller_convocatorio/imgConvocatorio/<?php echo $img_convo;?>"
                                            style="width: 70%; height: 85%;"
                                            alt="">
                                    </center>
                                    <?php
                                      }else {
                                        
                                          ?>
                                    <center><img
                                            src="<?php // echo $URL;?>public/img/perfil.png"
                                            width="30px" alt=""></center>
                                    <?php
                                        }
                                      ?>
                                    <p class="card-text">
                                        <?php echo $descripcion;?>
                                    </p>
                                    <h6 class="card-title">
                                        Ubicacion:<?php echo " ". $ubicacion;?>
                                    </h6>

                                    <p class="card-text">Fecha evento:
                                        <?php echo" ". $fecha;?>
                                    </p>

                                    <a href="<?php echo $URL;?>invitado/registro_invitado.php"
                                        class="btn btn-primary float-right">Enviar
                                        Datos</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                        <?php
            }
            ?>
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
include('../layout/footer.php');
?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php
include('../layout/script.php');
?>
</body>

</html>
