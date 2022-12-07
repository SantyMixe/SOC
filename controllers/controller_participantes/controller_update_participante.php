<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables

$evento = $_POST['evento'];
$tema_select = $_POST['tema'];
$nombres = $_POST['nombres'];
$apellidoP = $_POST['apellidoP'];
$apellidoM = $_POST['apellidoM'];
$fechaE = $_POST['datetime'];
$ubicacion = $_POST['ubicacion'];
$id_partic = $_POST['id_partic'];
$estadoselect = '1';

//Nombre de imagenes perfil
/*$foto_taller = "posters" .date('Y-m-d-h-i-s');
$filename = $foto_taller."_".$_FILES['file']['name'];
$location = "../posters/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);
*/
//echo $fechaHora;
 //echo $nombre."-".$apellido_p."-".$apellido_m."-".$email."-".$password."-".$cargo;

 //agregar a la bade de datos
 $sentenciaUpdate = $pdo->prepare('UPDATE participantes SET evento=:evento, tema_selec=:tema_selec,nombres=:nombres,apellido_p=:apellido_p,apellido_m=:apellido_m,
 horario=:horario,ubicacion=:ubicacion, estado=:estado WHERE id_partic=:id_partic');

 $sentenciaUpdate->bindParam(':evento',$evento);
 $sentenciaUpdate->bindParam(':tema_selec',$tema_select);
 $sentenciaUpdate->bindParam(':nombres',$nombres);
 $sentenciaUpdate->bindParam(':apellido_p',$apellidoP);
 $sentenciaUpdate->bindParam(':apellido_m',$apellidoM);
 $sentenciaUpdate->bindParam(':horario',$fechaE);
 $sentenciaUpdate->bindParam(':ubicacion',$ubicacion);
 $sentenciaUpdate->bindParam(':estado',$estadoselect);
 $sentenciaUpdate->bindParam(':id_partic',$id_partic);

 if ($sentenciaUpdate->execute()){   
    header('Location:'.$URL.'participantes/');
 }else{
    echo "No fue registado el usuario.";
 }
?>
