<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$tipo = $_POST['tipo'];
$tema = $_POST['tema'];
$descripcion = $_POST['descripcion'];
$nombres_tallerista = $_POST['nametallerista'];
$cupos = $_POST['cupos'];
$fechaHoraE = $_POST['datetime'];
$fechaHoraS = $_POST['datetime2'];
$herramienta = $_POST['herramienta'];
$ubicacion = $_POST['ubicacion'];
$estado = '1';


/*
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
*/
//Nombre de imagenes perfil
$foto_taller = "posters" .date('Y-m-d-h-i-s');
$filename = $foto_taller."_".$_FILES['file']['name'];
$location = "../posters/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);

//echo $fechaHora;
 //echo $nombre."-".$apellido_p."-".$apellido_m."-".$email."-".$password."-".$cargo;

 //agregar a la bade de datos
 $sentencia = $pdo->prepare(
    'INSERT INTO tema_taller
       (tipo, tema, descripcion, img_taller, nombre_tallerista, cupos, horario_entrada,horario_salida, herramientas, ubicacion, estado)
VALUES(:tipo, :tema, :descripcion, :img_taller, :nombre_tallerista, :cupos, :horario_entrada,:horario_salida,:herramientas, :ubicacion, :estado)');

//Agrega a la base de datos
 $sentencia->bindParam(':tipo',$tipo);
 $sentencia->bindParam(':tema',$tema);
 $sentencia->bindParam(':descripcion',$descripcion);
 $sentencia->bindParam(':img_taller',$filename);
 $sentencia->bindParam(':nombre_tallerista',$nombres_tallerista);
 $sentencia->bindParam(':cupos',$cupos);
 $sentencia->bindParam(':horario_entrada',$fechaHoraE);
 $sentencia->bindParam(':horario_salida',$fechaHoraS);
 $sentencia->bindParam(':herramientas',$herramienta);
 $sentencia->bindParam(':ubicacion',$ubicacion);
 $sentencia->bindParam(':estado',$estado);

 if ($sentencia->execute()){
    header('Location:'.$URL.'eventos/');
 }else{
    echo "No fue registado el usuario.";
 }
?>
