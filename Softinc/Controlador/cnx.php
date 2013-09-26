<?php
global $entrada;
$host="localhost"; //hosting
$user="postgres";  //usuario de postgres por defecto
$pw="postgres"; //contraseña
$port = 5432;      //puerto de postgres
$bd="olimpiada";      //base de datos a conectar
$entrada = pg_connect( "host=$host port=$port dbname=$bd user=$user password=$pw");
?>
