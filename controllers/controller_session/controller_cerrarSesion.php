<?php 

include ('../../app/config/config.php');

session_start();
if (isset($_SESSION['u_user'])){
//     echo "Existe session";
    session_destroy();
    header('Location:'.$URL);
} else {
    # code...
}

?>
