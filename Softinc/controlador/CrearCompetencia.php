<?php
include '../modelo/Competencia.php';
session_start();
$nombre_competencia =$_POST['nombre_competencia'];
$fecha_inicio       =$_POST['fecha_inicio'];
$fecha_fin          =$_POST['fecha_fin'];
$competencia=new Competencia();
$competencia->crearCompetencia($_SESSION["id_usuario"],$nombre_competencia, $fecha_inicio, $fecha_fin);
$idCompetencia='<input type="text" value='.$nombre_competencia.'>';
//require  '../vista/ContenidoCompetencia.php';
header("Location: ../vista/ContenidoCompetencia.php");

?>
