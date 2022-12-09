<?php
include ('../app/config/config.php');
 $email = $_POST['email'];

 $query_usuarios = $pdo->prepare("SELECT * FROM tb_usuarios ");
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $user_email){
    $password =$user_email['password'];
$email =$user_email['email'];

}

function limpiarAsunto($asunto)
{
    $cadena = "Subject";
    $longitud = strlen($cadena) + 2;
    return substr(
        iconv_mime_encode(
            $cadena,
            $asunto,
            [
                "input-charset" => "UTF-8",
                "output-charset" => "UTF-8",
            ]
        ),
        $longitud
    );
}

$asunto = limpiarAsunto("Congreso Unedl");
$destinatario =$email;

$encabezados = "MIME-Version: 1.0" . "\r\n";

# ojo, es una concatenación:
$encabezados .= 'From: SOC-Unedl<ojmlcntw@scunedl.x10.mx>' . "\r\n";

$mensaje = 'Hola si recibiste este Correo, favor de no responder'."\r\n".
" Haz intentado recuperar tu contraseña en sistema de Organizacion de Congresos"."\r\n".'User: '.$email."\r\n".'Contraseña: '.$password;
$resultado = mail($destinatario, $asunto, $mensaje, $encabezados); #Mandar al final los encabezados
if ($resultado) {
    header('Location:'.$URL.'login/index.php');

} else {
    header('Location:'.$URL.'login/index.php');
}
?>
