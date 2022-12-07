<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$nombres = $_POST['nombres'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$cargo = $_POST['cargo'];
$estado = '1';


if($password == $password2){
$email_dupli="";
$query_usuarios = $pdo->prepare("SELECT * FROM tb_usuarios where email = '$email'");
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $user_email){
$email_dupli =$user_email['email'];
}
if($email_dupli == $email){
   echo"El usuario ya existe en la base de datos";
}else{
  // echo"Este usuario no existe";
   //user admin
$user_creacion = "Santiago";
//definicion variable zona horario
date_default_timezone_set("America/Mexico_City");
$fechaHora = date('Y-m-d h:i:s');

//Nombre de imagenes perfil
$nombre_foto_perfil = "Congreso" .date('Y-m-d-h-i-s');
$filename = $nombre_foto_perfil."_".$_FILES['file']['name'];
$location = "../img_perfil/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);

//echo $fechaHora;
 //echo $nombre."-".$apellido_p."-".$apellido_m."-".$email."-".$password."-".$cargo;

 $pass_cifrada = password_hash($password, PASSWORD_DEFAULT, array("cost"=>10));
 //consulta a la bade de datos
 $sentencia = $pdo->prepare(
    'INSERT INTO tb_usuarios
       (nombres, apellido_p, apellido_m,foto_perfil, email, password, cargo, user_creacion, fyh_creacion, estado)
VALUES(:nombres, :apellido_p, :apellido_m,:foto_perfil, :email, :password, :cargo, :user_creacion, :fyh_creacion, :estado)');

//Agrega a la base de datos
 $sentencia->bindParam(':nombres',$nombres);
 $sentencia->bindParam(':apellido_p',$apellido_p);
 $sentencia->bindParam(':apellido_m',$apellido_m);
 $sentencia->bindParam(':foto_perfil',$filename);
 $sentencia->bindParam(':email',$email);
 $sentencia->bindParam(':password',$pass_cifrada);
 $sentencia->bindParam(':cargo',$cargo);
 $sentencia->bindParam(':user_creacion',$user_creacion);
 $sentencia->bindParam(':fyh_creacion',$fechaHora);
 $sentencia->bindParam(':estado',$estado);

 if ($sentencia->execute()){
    header('Location:'.$URL.'usuarios/');
    session_start();
   $_SESSION['msj']="Usuario registrado con exito.";
 }else{
   //echo "No fue registado el usuario.";
   header('Location:'.$URL.'usuarios/create.php');
   session_start();
   $_SESSION['msj']="No fue registado el usuario.";
 }
}
}else{
   //echo "Error en la contraseña, no son iguales";
   header('Location:'.$URL.'usuarios/create.php');
   session_start();
   $_SESSION['msj']="Error en la contraseña, no son iguales.";
}
?>
