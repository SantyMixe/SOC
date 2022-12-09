<?php

include ('../../app/config/config.php');

$correo = $_POST['email'];
$password = $_POST['password'];

$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$correo' AND estado = '1' ");
$query_login->execute();

$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);
$contador  =0;

foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $email = $usuario['email'];
    $password_tb = $usuario['password'];
}

if ($contador == "0"){
    header('Location:'.$URL.'login/');
    session_start();
    $_SESSION['msjLogin']="Error en el Usuario o la Contraseña";

}else{
    if(password_verify($password,$password_tb)){
        session_start();
        $_SESSION['u_user'] = $correo;
        header("Location:".$URL."principal.php");
    }else{
        header('Location:'.$URL.'login/');
        session_start();
        $_SESSION['msjLogin']="Error en el Usuario o la Contraseña";
    }
}

/*
try {
    //verifico los datos del login
    $email=htmlentities(addslashes($_POST['email']));
    $password=htmlentities(addslashes($_POST['password']));//variable auxiliar para comprobar que el usuario existe o no
    $contador = 0;//almaceno la consulta SQL en una variable
    $sql = "SELECT * FROM tb_usuarios WHERE email = :email AND estado = '1' ";
    //preparo la consulta SQL
    $resultado=$pdo->prepare($sql);
    //ejecucion de la consulta
    $resultado->execute(array(":email"=>$email));
    //resultado en un array asociativo tipo while
    while($login=$resultado->fetch(PDO::FETCH_ASSOC)) {
    if(password_verify($password, $login['password'])) {
        $_SESSION['u_user'] = $email;
        header("Location:".$URL."principal.php");
    $contador++;
    }
    }
    
    if ($contador>0) {
    echo "el usuario existe";
    } else {
        header('Location:'.$URL.'login/');
    echo "el usuario no existe";
    }
    
    //cierro la conexion
    $conexion = null;
    } catch(Exception $e) {
    die($e->getMessage());
    }


$email = htmlentities(addslashes($_POST['email']));
$password =htmlentities(addslashes( $_POST['password']));

//almacenamiento
$tabla_email = "";
$tabla_password = "";

//echo $email,$password;


$login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$email' AND
password = '$password' AND estado = '1'");
//print_r($login);
$login->execute();

$users = $login->fetchAll(PDO::FETCH_ASSOC);
foreach ($users as $user){

$tabla_email = $user['email'];
$tabla_password = $user['password'];
}
if (($email==$tabla_email) && (password_verify($password,$tabla_password))) {
// echo "Usuario correcto";
$_SESSION['u_user'] = $email;
header("Location:".$URL."principal.php");
} else {
// echo "Usuario incorrecto";
header("Location:".$URL."/login");
}

?>*/
?>
