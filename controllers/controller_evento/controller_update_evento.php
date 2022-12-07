<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$tipo = $_GET['tipo'];
$tema = $_GET['tema'];
$descripcion = $_GET['descripcion'];
$nombres_tallerista = $_GET['nametallerista'];
$cupos = $_GET['cupos'];
$fechaHoraE = $_GET['datetime'];
$fechaHoraS = $_GET['datetime2'];
$herramienta = $_GET['herramienta'];
$ubicacion = $_GET['ubicacion'];
$id = $_GET['id_taller'];
$estado='1';



//Nombre de imagenes perfil
$foto_taller = "posters" .date('Y-m-d-h-i-s');
$filename = $foto_taller."_".$_FILES['file']['name'];
$location = "../posters".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);


 //agregar a la bade de datos
 $sentencia = $pdo->prepare(
    ' UPDATE tema_taller SET tipo=:tipo,tema=:tema,descripcion=:descripcion,nombre_tallerista=:nombre_tallerista,
    cupos=:cupos,horario_entrada=:horario_entrada,horario_salida=:horario_salida,herramientas=:herramientas,
    ubicacion=:ubicacion,estado=:estado WHERE id_taller=:id_taller');

//Agrega a la base de datos
 $sentencia->bindParam(':tipo',$tipo);
 $sentencia->bindParam(':tema',$tema);
 $sentencia->bindParam(':descripcion',$descripcion);
 //$sentencia->bindParam(':img_taller',$filename);
 $sentencia->bindParam(':nombre_tallerista',$nombres_tallerista);
 $sentencia->bindParam(':cupos',$cupos);
 $sentencia->bindParam(':horario_entrada',$fechaHoraE);
 $sentencia->bindParam(':horario_salida',$fechaHoraS);
 $sentencia->bindParam(':herramientas',$herramienta);
 $sentencia->bindParam(':ubicacion',$ubicacion);
 $sentencia->bindParam(':estado',$estado);

 $sentencia->bindParam(':id_taller',$id);

 if ($sentencia->execute()){
    header('Location:'.$URL.'eventos/');
 }else{
    echo "No fue registado el usuario.";
 }
?>
