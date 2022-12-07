<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables

$id_partic = $_POST['id_partic'];
$estadoselect = '2';

//Nombre de imagenes perfil
/*$foto_taller = "posters" .date('Y-m-d-h-i-s');
$filename = $foto_taller."_".$_FILES['file']['name'];
$location = "../posters/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);
*/
//echo $fechaHora;
 //echo $nombre."-".$apellido_p."-".$apellido_m."-".$email."-".$password."-".$cargo;

 //agregar a la bade de datos
 $sentenciaUpdate = $pdo->prepare('UPDATE participantes SET estado=:estado WHERE id_partic=:id_partic');

 $sentenciaUpdate->bindParam(':estado',$estadoselect);
 $sentenciaUpdate->bindParam(':id_partic',$id_partic);

 if ($sentenciaUpdate->execute()){   
    header('Location:'.$URL.'participantes/participante_aprob.php');
 }else{
    echo "No fue registado el usuario.";
 }
?>
