<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$id = $_GET['id_convoc'];
$estado = '0';
 //agregar a la bade de datos
 $sentencia = $pdo->prepare('UPDATE convocatoria SET estado=:estado WHERE id_convocatoria=:id_convocatoria');

//Agrega a la base de datos

 $sentencia->bindParam(':estado',$estado);
 $sentencia->bindParam(':id_convocatoria',$id);
 
 if ($sentencia->execute()){
    header('Location:'.$URL.'convocatoria/');
 }else{
    echo "No fue Elimnado la Convocatorio.";
 }
?>
