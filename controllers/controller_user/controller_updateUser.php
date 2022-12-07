<?php
include ('../../app/config/config.php');

$nombre = $_GET['nombres'];
$apellido_p = $_GET['apellido_p'];
$apellido_m = $_GET['apellido_m'];
$email = $_GET['email'];
$password = $_GET['password'];
$password2 = $_GET['password2'];
$cargo = $_GET['cargo'];

$user_actualizacion = $_GET['user_session'];
$id_user = $_GET['id_user'];
date_default_timezone_set("America/Mexico_City");
$fechaHora = date('Y-m-d h:i:s');
$estado = '1';

//Nombre de imagenes perfil
$nombre_foto_perfil = "Congreso" .date('Y-m-d-h-i-s');
$filename = $nombre_foto_perfil."_".$_FILES['file']['name'];
$location = "../img_perfil/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);
if ($password==$password2) {
   $pass_cifrada = password_hash($password, PASSWORD_DEFAULT, array("cost"=>10));
    $sentencia = $pdo->prepare(
    'UPDATE tb_usuarios SET nombres=:nombres,apellido_p=:apellido_p,apellido_m=:apellido_m,
    email=:email,password=:password,cargo =:cargo,user_actualizacion=:user_actualizacion,
    fyh_actualizacion=:fyh_actualizacion,estado=:estado WHERE id=:id_user');

//Agrega a la base de datos
 $sentencia->bindParam(':nombres',$nombre);
 $sentencia->bindParam(':apellido_p',$apellido_p);
 $sentencia->bindParam(':apellido_m',$apellido_m);
 //$sentencia->bindParam(':foto_perfil',$filename);
 $sentencia->bindParam(':email',$email);
 $sentencia->bindParam(':password',$pass_cifrada);
 //$sentencia->bindParam(':password2',$password2);
 $sentencia->bindParam(':cargo',$cargo);
 $sentencia->bindParam(':user_actualizacion',$user_actualizacion);
 $sentencia->bindParam(':fyh_actualizacion',$fechaHora);
 $sentencia->bindParam(':estado',$estado);
 
$sentencia->bindParam(':id_user',$id_user);
 if ($sentencia->execute()){
  //  echo "Actualizado con exito";
   header('Location:'.$URL.'usuarios/');
 }else{
    echo "No fue registado el usuario.";
 }
}else{
   echo "Error en la contraseña, no son iguales";
}
?>
