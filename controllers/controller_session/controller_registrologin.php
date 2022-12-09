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
//$cargo = $_POST['cargo'];
$estado = '1';
$cargo = 'Alumno';

if($password == $password2){
   //echo"Las contraseñas son correctas";
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
$location = "img_perfil/".$filename;
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
   limpiarAsunto($asunto);
   header('Location:'.$URL.'login/index.php');
   session_start();
   $_SESSION['msjLoginR']="Usuario registrado con exito, valida tu correo electronico";
 }else{
   header('Location:'.$URL.'login/registrar.php');
   session_start();
   $_SESSION['msjLoginR']="No fue registado el usuario.";
//    echo "No fue registado el usuario.";
 }
}
}else{
   header('Location:'.$URL.'login/registrar.php');
   session_start();
   $_SESSION['msjLoginR']="Error en la contraseña, no son iguales";
//   echo "Error en la contraseña, no son iguales";
}

function limpiarAsunto($asunto)
{
    $cadena = "Subject";
    $longitud = strlen($cadena) + 2;
    return substr(
        iconv_mime_encode(
            $cadena,
            $asunto,
            [
                "input-charset" => "UTF-8",
                "output-charset" => "UTF-8",
            ]
        ),
        $longitud
    );
}

$asunto = limpiarAsunto("Congreso Unedl");
$destinatario =$email;

$encabezados = "MIME-Version: 1.0" . "\r\n";

# ojo, es una concatenación:
$encabezados .= 'From: SOC-Unedl<ojmlcntw@scunedl.x10.mx>' . "\r\n";

$mensaje = 'Hola si recibiste este Correo, favor de no responder'."\r\n".
"Te haz registrado en el sistema de Organizacion de Congresos"."\r\n".'User: '.$email."\r\n".'Contraseña: '.$password;
$resultado = mail($destinatario, $asunto, $mensaje, $encabezados); #Mandar al final los encabezados
if ($resultado) {
    echo "Correo enviado";
} else {
    echo "Correo NO enviado";
}
?>
