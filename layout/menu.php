<?php

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $URL; ?>principal.php" class="brand-link">
        <img src="<?php echo $URL; ?>/app/template/dist/img/unedl.png"
            alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SOC-Unedl</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-4 pb-6 mb-4 d-flex">
            <div class="image">
                <br>
                <?php
                $caracter_buscar = ".";
                $buscar = strpos($fotoP_session,$caracter_buscar);
                if($buscar == true){
                //echo "Existe foto de perfil";
                ?><img
                    src="<?php echo $URL;?>controllers/img_perfil/<?php echo $fotoP_session;?>"
                    class="img-circle" style="width:45px;" alt="User Image">
                <?php
                }else {
                  ?>
                <img src="<?php echo $URL;?>public/img/perfil.png"
                    class="img-circle" style="width:40px;" alt="User Image">
                <?php
                }
                ?>

            </div>
            <div class="info">
                <a class="d-block text-center h5"><?php echo $nombre_session; ?>
                </a>
                <a class="d-block h6"><?php echo $apellidoP_session." ".$apellidoM_session; ?>
                </a>
                <a class="d-block">
                    <center><?php echo $cargo_session; ?></center>
                </a>
            </div>
        </div>
        <?php
        if ($cargo_session=="Administrador") {
            ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column "
                data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-clipboard"></i>
                        <p>
                            Convocatoria
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>convocatoria/"
                                class="nav-link">
                                <i
                                    class="nav-icon fas fa-solid fa-person-chalkboard"></i>
                                <p>Convocatorias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>convocatoria/create.php"
                                class="nav-link">
                                <i
                                    class="nav-icon fas fa-solid fa-folder-plus "></i>
                                <p>Crear Convocatoria</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <br>
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-users-line"></i>
                        <p>
                            Invitados
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>invitado/"
                                class="nav-link">
                                <i
                                    class="nav-icon fas fa-solid fa-users-viewfinder"></i>
                                <p>Invitados Registrados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>invitado/invitado_aprob.php"
                                class="nav-link">
                                <i
                                    class="nav-icon fas fa-solid fa-user-check "></i>
                                <p>Invitados Aprobados</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <br>
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-calendar-days"></i>
                        <p>
                            Eventos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>eventos/"
                                class="nav-link">
                                <i class=" nav-icon fas fa-calendar"></i>
                                <p> Eventos Registrado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>eventos/create_eventos.php"
                                class="nav-link">
                                <i
                                    class=" nav-icon fas fa-solid fa-calendar-check"></i>
                                <p>Registro Evento</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <br>
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-people-group"></i>
                        <p>
                            Participantes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>participantes/"
                                class="nav-link">
                                <i
                                    class=" nav-icon fas fa-solid fa-people-roof "></i>
                                <p>Participantes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>participantes/participante_aprob.php"
                                class="nav-link">
                                <i
                                    class="nav-icon fas fa-solid fa-user-check "></i>
                                <p>participantes Aprobados</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <br>
                <li class="nav-item ">
                    <a href="#" class="nav-link active ">
                        <i class="nav-icon fas fa-users "></i>
                        <p>
                            Usuarios
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="<?php echo $URL; ?>usuarios/"
                                class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Listado de Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>usuarios/create.php"
                                class="nav-link">
                                <i
                                    class="fas fa-solid fa-user-plus nav-icon"></i>
                                <p>Registro Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>

        </nav>
        <!-- /.sidebar-menu -->
        <?php
        }if($cargo_session=="Alumno") {
            ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Eventos Aprovados
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>participantes/"
                                class="nav-link">
                                <i
                                    class="fas <fa-solid fa-user-plus nav-icon"></i>
                                <p>Evento Seleccionado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>participantes/participante_aprob.php"
                                class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Eventos Aprobados</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
        <?php
        }if($cargo_session=="Prefect@") {
            ?>
        <!-- /.sidebar-menu -->
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column "
                data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-clipboard"></i>
                        <p>
                            Convocatoria
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>convocatoria/"
                                class="nav-link">
                                <i
                                    class="nav-icon fas fa-solid fa-person-chalkboard"></i>
                                <p>Convocatorias</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <br>
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-users-line"></i>
                        <p>
                            Invitados
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>invitado/"
                                class="nav-link">
                                <i
                                    class="nav-icon fas fa-solid fa-users-viewfinder"></i>
                                <p>Invitados Registrados</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <br>
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-calendar-days"></i>
                        <p>
                            Eventos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>eventos/"
                                class="nav-link">
                                <i class=" nav-icon fas fa-calendar"></i>
                                <p> Eventos Registrado</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <br>
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-solid fa-people-group"></i>
                        <p>
                            Participantes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>participantes/"
                                class="nav-link">
                                <i
                                    class=" nav-icon fas fa-solid fa-people-roof "></i>
                                <p>Participantes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>participantes/participante_aprob.php"
                                class="nav-link">
                                <i
                                    class="nav-icon fas fa-solid fa-user-check "></i>
                                <p>participantes Aprobados</p>
                            </a>
                        </li>
                    </ul>
                </li>
        </nav>
        <?php
        }if($cargo_session=="Maestro") {
            ?>
        <!-- /.sidebar-menu -->
        <nav class="mt-2 ">
            <ul class="nav nav-pills nav-sidebar flex-column "
                data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
        </nav>
        <?php
        }
        ?>
    </div>
    <!-- /.sidebar -->
</aside>
