<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$ubicacion = $_POST['ubicacion'];
$telefono = $_POST['telefono'];
$fecha = $_POST['datetime'];
$estado = '1';


//Nombre de imagenes perfil
$img_convoc = "convoc" .date('Y-m-d-h-i-s');
$filename = $img_convoc."_".$_FILES['file']['name'];
$location = "imgConvocatorio/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);

//echo $fechaHora;
 //echo $nombre."-".$apellido_p."-".$apellido_m."-".$email."-".$password."-".$cargo;

 //agregar a la bade de datos
 $sentencia = $pdo->prepare(
    'INSERT INTO convocatoria
       (tipo_evento,descripcion, ubicacion, telefono, fecha, img_convo,estado)
VALUES(:tipo_evento, :descripcion, :ubicacion, :telefono, :fecha, :img_convo, :estado )');

//Agrega a la base de datos
 $sentencia->bindParam(':tipo_evento',$tipo);
 $sentencia->bindParam(':descripcion',$descripcion);
 $sentencia->bindParam(':ubicacion',$ubicacion);
 $sentencia->bindParam(':telefono',$telefono);
 $sentencia->bindParam(':fecha',$fecha);
 $sentencia->bindParam(':img_convo',$filename);
 $sentencia->bindParam(':estado',$estado);


 if ($sentencia->execute()){
    header('Location:'.$URL.'convocatoria/');
 }else{
    echo "No fue registado el usuario.";
 }
?>
