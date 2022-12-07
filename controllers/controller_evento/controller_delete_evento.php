<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$id = $_GET['id_taller'];
$estado = '0';
 //agregar a la bade de datos
 $sentencia = $pdo->prepare('UPDATE tema_taller SET estado=:estado WHERE id_taller=:id_taller');

//Agrega a la base de datos

 $sentencia->bindParam(':estado',$estado);
 $sentencia->bindParam(':id_taller',$id);
 
 if ($sentencia->execute()){
    header('Location:'.$URL.'eventos/');
 }else{
    echo "No fue registado el usuario.";
 }
?>
