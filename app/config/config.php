<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','tlahuitoltepec');
define('BD','congresoUNEDL');

$URL = 'http://localhost:8080/DEVELOPPER/Titulacion/';

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try {
    $pdo = new PDO($servidor,USUARIO,PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
//    echo"<script>alert('La conexion a la base de datos fue exitoso')</script>";
} catch (PDOException $e) {
//    echo"<script>alert('Error a la conexion con la base de datos ')</script>";
}
