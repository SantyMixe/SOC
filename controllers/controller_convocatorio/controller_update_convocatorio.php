<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$tipo_convoc = $_POST['tipo_evento'];
$descripcion = $_POST['descripcion'];
$ubicacion = $_POST['ubicacion'];
$telefono = $_POST['telefono'];
$fecha = $_POST['datetime'];
$id = $_POST['id_convoc'];
$estado='1';



//Nombre de imagenes perfil
$img_convo = "imgConv" .date('Y-m-d-h-i-s');
$filename = $img_convo."_".$_FILES['file']['name'];
$location = "imgConvocatorio/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);


 //agregar a la bade de datos
 $sentencia = $pdo->prepare(
    ' UPDATE convocatoria SET tipo_evento=:tipo_evento,descripcion=:descripcion, ubicacion=:ubicacion,
    telefono=:telefono,fecha=:fecha,img_convo=:img_convo, estado=:estado WHERE id_convocatoria=:id_convocatoria');

//Agrega a la base de datos
 $sentencia->bindParam(':tipo_evento',$tipo_convoc);
 $sentencia->bindParam(':descripcion',$descripcion);
 $sentencia->bindParam(':ubicacion',$ubicacion);
 $sentencia->bindParam(':telefono',$telefono);
 $sentencia->bindParam(':fecha',$fecha);
 $sentencia->bindParam(':img_convo',$filename);
 $sentencia->bindParam(':estado',$estado);
 $sentencia->bindParam(':id_convocatoria',$id);

 if ($sentencia->execute()){
    header('Location:'.$URL.'convocatoria/');
 }else{
    echo "No fue registado el usuario.";
 }
?>
