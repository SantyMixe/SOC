<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$id = $_GET['id_particcancel'];
$estado = '1';
 //agregar a la bade de datos
 $sentencia = $pdo->prepare('UPDATE participantes SET estado=:estado WHERE id_partic=:id_partic');

//Agrega a la base de datos

 $sentencia->bindParam(':estado',$estado);
 $sentencia->bindParam(':id_partic',$id);
 
 if ($sentencia->execute()){
    header('Location:'.$URL.'participantes/');
 }else{
    echo "No fue eliminado el invitado.";
 }
?>
