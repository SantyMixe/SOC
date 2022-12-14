<?php
$id_user = $_GET['id'];
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
    <title>SG-Eliminar Usuario</title>
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
                            <h1 class="m-0">Eliminar Usuario</h1>
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
                        <h3 class="card-title">??Estas Seguro Eliminar el
                            Usuario?</h3>
                    </div>

                    <?php
                    $consulta_users = $pdo->prepare("SELECT * FROM tb_usuarios WHERE id = '$id_user'");
                    $consulta_users->execute();
                    $users = $consulta_users->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($users as $user){
                      
                      $id = $user['id'];
                      $nombre = $user['nombres'];
                      $apellido_p = $user['apellido_p'];
                      $apellido_m = $user['apellido_m'];
                      $email = $user['email'];
                      $password = $user['password'];
                      $password2 = $user['password2'];
                      $cargo = $user['cargo'];
                      $foto_p = $user['foto_perfil'];
                    }
                    ?>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="card-body row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for=""
                                    class="col-sm-4 col-form-label">Nombres</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"
                                        name="nombres"
                                        value="<?php echo $nombre; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for=""
                                    class="col-sm-4 col-form-label">Apellido
                                    Paterno</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"
                                        name="apellido_p"
                                        value="<?php echo $apellido_p; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for=""
                                    class="col-sm-4 col-form-label">Apellido
                                    Materno</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"
                                        name="apellido_m"
                                        value="<?php echo $apellido_m; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for=""
                                    class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control"
                                        name="email"
                                        value="<?php echo $email; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for=""
                                    class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control"
                                        name="password"
                                        value="<?php echo $password; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for=""
                                    class="col-sm-4 col-form-label">Confirmar
                                    Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control"
                                        name="password2"
                                        value="<?php echo $password2; ?>"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group row">
                                <label for=""
                                    class="col-sm-4 col-form-label">Cargo</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2bs4"
                                        style="width: 100%;" name="cargo"
                                        disabled>
                                        <option value="<?php echo $cargo; ?>"
                                            selected>
                                            <?php echo $cargo; ?>
                                        </option>
                                        <option value="Administrador">
                                            Administrador</option>
                                        <option value="Alumno">
                                            Alumno
                                        </option>
                                        <option value="Maestro">
                                            Maestro
                                        </option>
                                        <option value="Prefect@">
                                            Prefect@
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <input type="text"
                                value="<?php echo $user_session;?>"
                                name="user_session" hidden>
                            <input type="text" value="<?php echo $id;?>"
                                name="id_user" hidden>
                        </div>
                    </div>
                    <br>
                    <div class="card-footer">
                        <center><a href="<?php echo $URL;?>usuarios/"
                                class="btn btn-lg btn-info">Cancelar</a>
                            <a href="<?php echo $URL;?>controllers/controller_user/controller_deleteUser.php?id=<?php echo $id;?>&&user_eliminacion=<?php echo $user_session;?>"
                                class="btn btn-lg btn-danger">Eliminar</a>

                        </center>
                    </div>
                </div>
        </div>
        </form>
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
?>
</body>

</html>

<script>
function archivo(evt) {
    var files = evt.target.files; // FileList object
    // Obtenemos la imagen del campo "file".
    for (var i = 0, f; f = files[i]; i++) {
        //Solo admitimos im??genes.
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();

        reader.onload = (function(theFile) {
            return function(e) {
                // Insertamos la imagen
                document.getElementById("list").innerHTML = [
                    '<img class="thumb" src="', e.target.result,
                    '" title="', escape(theFile.name), '"/>'
                ].join('');
            };
        })(f);

        reader.readAsDataURL(f);
    }
}

document.getElementById('file').addEventListener('change', archivo, false);
</script>
