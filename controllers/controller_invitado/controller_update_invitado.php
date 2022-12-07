<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$tipo = $_POST['tipo'];
$tema = $_POST['tema'];
$descripcion = $_POST['descripcion'];
$requesito = $_POST['requesito'];
$nombres = $_POST['nombres'];
$apellidoP = $_POST['apellidoP'];
$apellidoM = $_POST['apellidoM'];
$email = $_POST['email'];
$compania = $_POST['compania'];
$ocupacion = $_POST['ocupacion'];
$estado = '1';


$idinvit = $_POST['id_invit'];


//Nombre de imagenes perfil
$resenia = "reseña" .date('Y-m-d-h-i-s');
$filename = $resenia."_".$_FILES['file']['name'];
$location = "reseña/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);

//echo $fechaHora;
 //echo $nombre."-".$apellido_p."-".$apellido_m."-".$email."-".$password."-".$cargo;

 //Actualizar a la bade de datos

 $sentenciaUpdate = $pdo->prepare('UPDATE invitado SET tipoe=:tipoe, tema_prop=:tema_prop, descripcion=:descripcion, requesito=:requesito, 
 nombres=:nombres,apellidoP=:apellidoP,apellidoM=:apellidoM,email=:email,compania=:compania,ocupacion=:ocupacion,resenia=:resenia,estado=:estado 
 WHERE id_invitado=:id_invitado');

   $sentenciaUpdate->bindParam(':tipoe',$tipo);
   $sentenciaUpdate->bindParam(':tema_prop',$tema);
   $sentenciaUpdate->bindParam(':descripcion',$descripcion);
   $sentenciaUpdate->bindParam(':requesito',$requesito);
   $sentenciaUpdate->bindParam(':nombres',$nombres);
   $sentenciaUpdate->bindParam(':apellidoP',$apellidoP);
   $sentenciaUpdate->bindParam(':apellidoM',$apellidoM);
   $sentenciaUpdate->bindParam(':email',$email);
   $sentenciaUpdate->bindParam(':compania',$compania);
   $sentenciaUpdate->bindParam(':ocupacion',$ocupacion);
   $sentenciaUpdate->bindParam(':compania',$compania);
   $sentenciaUpdate->bindParam(':resenia',$filename);
   $sentenciaUpdate->bindParam(':estado',$estado);
   $sentenciaUpdate->bindParam(':id_invitado',$idinvit);

 if ($sentenciaUpdate->execute()){
    header('Location:'.$URL.'invitado/');
 }else{
    echo "No se actualizó el usuario.";
 }
?>
