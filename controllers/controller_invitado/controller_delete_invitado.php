<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$id = $_GET['id_invit'];
$estado = '0';
 //agregar a la bade de datos
 $sentencia = $pdo->prepare('UPDATE invitado SET estado=:estado WHERE id_invitado=:id_invitado');

//Agrega a la base de datos

 $sentencia->bindParam(':estado',$estado);
 $sentencia->bindParam(':id_invitado',$id);
 
 if ($sentencia->execute()){
    header('Location:'.$URL.'invitado/');
 }else{
    echo "No fue eliminado el invitado.";
 }
?>
