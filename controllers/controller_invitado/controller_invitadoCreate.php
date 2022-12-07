<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$evento = $_POST['tipoe'];
$tema_prop = $_POST['tema_prop'];
$descrip = $_POST['descripcion'];
$requisit = $_POST['requesito'];
$nombre = $_POST['nombres'];
$apellidoP = $_POST['apellidoP'];
$apellidoM = $_POST['apellidoM'];
$email = $_POST['email'];
$compania = $_POST['compania'];
$ocupacion = $_POST['ocupacion'];
$estado = '1';



//Nombre de imagenes perfil
$file_invitado = "reseña" .date('Y-m-d-h-i-s');
$filename = $nombre."_".$file_invitado."_".$_FILES['file']['name'];
$location = "reseña/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);

//echo $fechaHora;
 //echo $nombre."-".$apellido_p."-".$apellido_m."-".$email."-".$password."-".$cargo;

 //agregar a la bade de datos
 $sentencia = $pdo->prepare(
    'INSERT INTO invitado
       (tipoe,tema_prop,descripcion,requesito, nombres, apellidoP, apellidoM, email, compania, ocupacion, resenia, estado)
VALUES(:tipoe,:tema_prop,:descripcion,:requesito,:nombres, :apellidoP, :apellidoM, :email, :compania, :ocupacion, :resenia, :estado)');

//Agrega a la base de datos
 $sentencia->bindParam(':tipoe',$evento);
 $sentencia->bindParam(':tema_prop',$tema_prop);
 $sentencia->bindParam(':descripcion',$descrip);
 $sentencia->bindParam(':requesito',$requisit);
 $sentencia->bindParam(':nombres',$nombre);
 $sentencia->bindParam(':apellidoP',$apellidoP);
 $sentencia->bindParam(':apellidoM',$apellidoM);
 $sentencia->bindParam(':email',$email);
 $sentencia->bindParam(':compania',$compania);
 $sentencia->bindParam(':ocupacion',$ocupacion);
 $sentencia->bindParam(':resenia',$filename);
 $sentencia->bindParam(':estado',$estado);

 if ($sentencia->execute()){
    header('Location:'.$URL);
    session_start();
    $_SESSION['msjInvitR']="Tu informacion fue enviado con exito!";
 }else{
   header('Location:'.$URL.'invitado/registro_invitado.php');
   session_start();
   $_SESSION['msjInvitR']="No fue registrado tu información";
//    echo "No fue registado el usuario.";
 }
?>
