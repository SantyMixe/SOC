<?php
//conexion a la bade de datos.
include ('../../app/config/config.php');

//definicion de variables
$evento = $_POST['evento'];
$tema_select = $_POST['tema'];
$nombres = $_POST['nombres'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$email = $_POST['email'];
$horario = $_POST['horario'];
$ubicacion = $_POST['ubicacion'];
$estado = '1';

$tema_dupli="";
$query_temas = $pdo->prepare("SELECT * FROM participantes where tema_selec = '$tema_select'");
$query_temas->execute();
$temas = $query_temas->fetchAll(PDO::FETCH_ASSOC);
foreach($temas as $tema_select){
$tema_dupli =$tema_select['tema'];
}
if($tema_dupli == $tema_select){
   echo"Ya tienes el mismo tema Seleccionado";
}else{
  // echo"Este usuario no existe";
   //user admin
/*$user_creacion = "Santiago";
//definicion variable zona horario
date_default_timezone_set("America/Mexico_City");
$fechaHora = date('Y-m-d h:i:s');
*/
//Nombre de imagenes perfil
$nombre_pago = "pago" .date('Y-m-d-h-i-s');
$filename = $nombre_pago."_".$_FILES['file']['name'];
$location = "pago_img/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'],$location);

$nombre_pago1 = "pago1" .date('Y-m-d-h-i-s');
$filename1 = $nombre_pago1."_".$_FILES['file1']['name'];
$location = "pago_img/".$filename1;
move_uploaded_file($_FILES['file1']['tmp_name'],$location);

$nombre_pago2 = "pago2" .date('Y-m-d-h-i-s');
$filename2 = $nombre_pago2."_".$_FILES['file2']['name'];
$location = "pago_img/".$filename2;
move_uploaded_file($_FILES['file2']['tmp_name'],$location);

//echo $fechaHora;
 //echo $nombre."-".$apellido_p."-".$apellido_m."-".$email."-".$password."-".$cargo;

 //consulta a la bade de datos
 $sentencia = $pdo->prepare(
    'INSERT INTO participantes
       (evento, tema_selec, nombres,apellido_p, apellido_m, email, horario, ubicacion, pago_total, pago_parcial1,pago_parcial2, estado)
VALUES(:evento, :tema_selec, :nombres, :apellido_p, :apellido_m, :email, :horario, :ubicacion, :pago_total, :pago_parcial1, :pago_parcial2, :estado)');

//Agrega a la base de datos
$sentencia->bindParam(':evento',$evento);
$sentencia->bindParam(':tema_selec',$tema_select);
 $sentencia->bindParam(':nombres',$nombres);
 $sentencia->bindParam(':apellido_p',$apellido_p);
 $sentencia->bindParam(':apellido_m',$apellido_m);
 $sentencia->bindParam(':email',$email);
 $sentencia->bindParam(':horario',$horario);
 $sentencia->bindParam(':ubicacion',$ubicacion);
 $sentencia->bindParam(':pago_total',$filename);
 $sentencia->bindParam(':pago_parcial1',$filename1);
 $sentencia->bindParam(':pago_parcial2',$filename2);
 $sentencia->bindParam(':estado',$estado);

 if ($sentencia->execute()){
    header('Location:'.$URL.'principal.php');
 }else{
    echo "No fue registado el usuario.";
 }
}

?>
