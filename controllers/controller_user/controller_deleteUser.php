<?php
include ('../../app/config/config.php');


$user_eliminacion = $_GET['user_eliminacion'];
$id_user = $_GET['id'];

date_default_timezone_set("America/Mexico_City");
$fechaHora = date('Y-m-d h:i:s');
$estado = '0';

    $sentencia = $pdo->prepare(
    'UPDATE tb_usuarios SET user_eliminacion=:user_eliminacion,fyh_eliminacion=:fyh_eliminacion,estado=:estado WHERE id=:id');


 
 $sentencia->bindParam(':user_eliminacion',$user_eliminacion);
 $sentencia->bindParam(':fyh_eliminacion',$fechaHora);
 $sentencia->bindParam(':estado',$estado); 
 $sentencia->bindParam(':id',$id_user);

 if ($sentencia->execute()){
    echo "Eliminado con exito";
   header('Location:'.$URL.'usuarios/');
 }else{
    echo "No fue registado el usuario.";
 }

?>
